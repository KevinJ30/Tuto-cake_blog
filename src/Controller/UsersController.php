<?php

namespace App\Controller;

use Cake\Mailer\Email;
use Cake\ORM\Entity;

class UsersController extends AppController{

    public function inscription(){
        $user = $this->Users->newEntity();

        if($this->request->is('post')){
            $user->token = $user->generateToken();
            $user->permission = 'membre';

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
            $user->token = null;
            $user->activated = date('d-m-y');
            $this->Users->save($user);
            $this->Flash->success('Votre compte a été activé');
            return $this->redirect(['prefix' => null, 'controller' => 'users', 'action' => 'login']);
        }
        else
        {
            $this->Flash->error('E-mail de validation n\'est pas valable.');
            return $this->redirect('/');
        }
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();

            if($user){
                $this->Auth->setUser($user);
                $this->Flash->success('Vous-êtes maintenant connecté.');
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Le nom d\'utilisateur ou le mot de passe est incorrect. Veuillez recommencer.');
            }
        }
    }

    public function logout(){
        $this->Flash->success('Vous-êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Page du profil
     **/
    public function profil(){
        $userId = $this->Auth->user('id');

        $user = $this->Users->find('all', [
            'fields' => ['username', 'created', 'activated','email']
        ])->where(['id' => $userId])->first();


        if($this->request->is(['post', 'put'])){
            $this->Users->patchEntity($user, $this->request->data);

            if($this->Users->save($user)){
                $this->Flash->success('Votre profil a été modifier');
                return $this->redirect(['prefix' => false, 'controller' => 'users', 'action' => 'profil']);
            }
        }

        $this->set('user', $user);
    }

    public function updatePassword(){
        $user = $this->Users->find('all', ['fields' => ['id', 'email', 'username']])->where(['id' => $this->Auth->user('id')])->first();

        if($this->request->is(['post', 'put'])){
            $this->Users->patchEntity($user, $this->request->data);

            $user->tmp_password = $this->request->data['password'];
            $user->token = $user->generateToken();

            unset($user->password);

            if($this->Users->save($user)){
                $this->Flash->success('Votre mot de passe a été modifier. <br /> Un e-mail de confirmation vous a été envoyé.', ['escape' => false]);

                // E-mail de confirmation
                $email = new Email('default');
                $email->template('resetPassword')
                    ->emailFormat('html')
                    ->from(['Webmaster@StudioDuWeb.com' => 'StudioDuWeb'])
                    ->to($user->email)
                    ->subject('Modification du mot de passe')
                    ->viewVars(['user' => $user])
                    ->send();

                return $this->redirect(['prefix' => false, 'controller' => 'users', 'action' => 'profil']);
            }
        }

        $this->set('user', $user);
    }

    public function validatePassword($token, $username){
        $user = $this->Users->find()->where(['username' => $username])->first();

        if($user->token == $token){
            $user = new Entity($user->toArray());
            $user->password = $user->tmp_password;
            $user->tmp_password = null;
            $user->token = null;

            $this->Users->save($user);
            $this->Flash->success('Votre mot de passe a été modifié.');
            return $this->redirect(['prefix' => null, 'controller' => 'users', 'action' => 'login']);
        }
        else
        {
            $this->Flash->error('E-mail de validation n\'est pas valable.');
            return $this->redirect('/');
        }
    }

}