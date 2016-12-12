<?php

namespace App\Controller;

use Cake\Mailer\Email;

class UsersController extends AppController{

    public function inscription(){
        $user = $this->Users->newEntity();

        if($this->request->is('post')){
            $user->token = $user->generateToken();
            $this->Users->patchEntity($user, $this->request->data);

            if($this->Users->save($user)){

                $this->Flash->success('Votre compte a été enregistrer, vous allez recevoir un e-mail de confirmation.');

                // Une fois que l'on est sur de l'avoir enregistrer on envoie un mail de confirmation
                $email = new Email('default');
                $email->template('inscription')
                    ->emailFormat('html')
                    ->from(['Webmaster@StudioDuWeb.com' => 'StudioDuWeb'])
                    ->to($user->email)
                    ->subject('Inscription')
                    ->viewVars(['user' => $user])
                    ->send();

                return $this->redirect('/');
            }
            else
            {
                $this->Flash->error('Des erreurs sont présente dans le formulaire.');
            }
        }

        $this->set('user', $user);
    }

    public function validate($token, $username){
        $user = $this->Users->find()->where(['username' => $username])->first();

        if($user->token == $token){
            $user->activated = date('d-m-y');
            $this->Users->save($user);
            $this->Flash->success('Votre compte a été activé');
            return $this->redirect(['prefix' => null, 'controller' => 'users', 'action' => 'login']);
        }
        else
        {
            $this->Flash->error('Votre token d\'inscription à expiré');
            return $this->redirect('/');
        }
    }

}