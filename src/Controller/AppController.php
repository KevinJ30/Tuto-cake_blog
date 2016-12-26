<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['controller'],
            'unauthorizedRedirect' => '/articles',
            'loginAction' => ['prefix' => false, 'controller' => 'Users', 'action' => 'login'],
            'loginRedirect' => [
                'prefix' => false,
                'controller' => 'Articles',
                'action' => 'index'
            ],
            'authError' => 'Vous n\'avez les droits suffisant',
            'logoutRedirect' => [
                'prefix' => false,
                'controller' => 'Articles',
                'action' => 'index'
            ],
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth',
                    'passwordHasher' => [
                        'className' => 'Legacy'
                    ]
                ]
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->viewBuilder()->layout('bootstrap');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $prefix = isset($this->request->params['prefix']) ? $this->request->params['prefix'] : false;

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        // Si on est sur une page d'administration on change le layout
        if($prefix){
            $this->viewBuilder()->layout('admin');
        }
    }

    // Gére les authorisation d'accès
    public function isAuthorized($user){
        $prefix = isset($this->request->params['prefix']) ? $this->request->params['prefix'] : false;

        if(!$prefix){
            return true;
        }

        // Si on est admin on accède à tous
        if(isset($user['permission']) && $user['permission'] === 'admin'){
            return true;
        }

        if($prefix && $user['permission'] == $prefix){
            return true;
        }

        //var_dump($user); die;

        $this->Flash->error('Vous n\'avez pas les droits suffisant.');
        return false;
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if(isset($this->request->params['prefix']) && $this->request->params['prefix'] != null){
            $this->Auth->deny();
        }
        else
        {
            $this->Auth->allow();
        }
    }
}
