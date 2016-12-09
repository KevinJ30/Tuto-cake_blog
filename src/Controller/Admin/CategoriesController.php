<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class CategoriesController extends AppController{

    /**
     * index
     * Affiche la liste des catégories
     **/
    public function index(){
        $categories = $this->Categories->find('all')->order(['id desc']);
        $this->set('categories', $categories);
    }

    /**
     * add
     *
     * Ajoute une categorie
     **/
    public function add(){
        $categorie = $this->Categories->newEntity();

        if($this->request->is('post')){
            $this->Categories->patchEntity($categorie, $this->request->data);
            $this->Categories->save($categorie);

            $this->Flash->success('La catégorie à été ajouté');
            $this->redirect(['prefix' => 'admin', 'controller' => 'categories', 'action' => 'index']);
        }

        $this->set('categorie', $categorie);
    }

    /**
     * edit($id)
     * @param $id : id de la categorie à modifier
     **/
    public function edit($id){
        $categorie = $this->Categories->find()->where(['id' => $id])->first();

        // Si la catéégorie n'est pas trouvé on léve une exception
        if(!$categorie || $categorie == null){
            throw new NotFoundException('La catégorie n\'existe pas');
        }

        if($this->request->is(['post', 'put'])){
            $this->Categories->patchEntity($categorie, $this->request->data);
            $this->Categories->save($categorie);
            $this->Flash->success('La catégorie à été modifié');
            $this->redirect(['prefix' => 'admin', 'controller' => 'categories', 'action' => 'index']);
        }

        $this->set('categorie', $categorie);
    }

    /**
     * delete($id)
     * @param $id : Id de la catégorie
     **/
    public function delete($id){
        $categorie = $this->Categories->find()->where(['id' => $id])->first();

        if(!$categorie || $id = null){
            throw new NotFoundException('La catégorie n\'existe pas');
        }

        if($this->Categories->delete($categorie)){
            $this->Flash->success('La catégorie à été supprimé');
            $this->redirect(['prefix' => 'admin', 'controller' => 'categories', 'action' => 'index']);
        }
    }

}