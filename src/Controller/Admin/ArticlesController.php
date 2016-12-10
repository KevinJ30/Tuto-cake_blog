<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class ArticlesController extends AppController{

    public function index(){
        $articles = $this->Articles->find()->order(['Articles.id desc'])->contain(['Categories']);
        $this->set('articles', $articles);
    }

    /**
     * Ajoute un article
     **/
    public function add(){
        $article = $this->Articles->newEntity();
        $categories = $this->Articles->Categories->find('list');

        if($this->request->is('post')){
            var_dump($this->request->data);
            $this->Articles->patchEntity($article, $this->request->data);

            if($this->Articles->save($article)){
                $this->Flash->success('L\'article à été ajouté');
                return $this->redirect(['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index']);
            }
        }

        $this->set(['categories' => $categories, 'article' => $article]);
    }

    /**
     * Editer un article
     * @param $id : id de l'article
     **/
    public function edit($id){
        $article = $this->Articles->find()->where(['id' => $id])->first();
        $categories = $this->Articles->Categories->find('list');

        if(!$article){
            throw new NotFoundException('L\'article n\'existe pas');
        }

        if($this->request->is(['post', 'put'])){
            $this->Articles->patchEntity($article, $this->request->data);

            if($this->Articles->save($article)){
                $this->Flash->success('L\'article à été modifier');
                return $this->redirect(['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index']);
            }
        }

        $this->set(['article' => $article, 'categories' => $categories]);
    }

    /***
     * @param $id : id de l'article
     **/
    public function delete($id){
        $this->request->allowMethod(['post', 'put']);

        $article = $this->Articles->get($id);

        if(!$article){
            throw new NotFoundException('L\'article n\'existe pas');
        }

        if($this->Articles->delete($article)){
            $this->Flash->success('L\'article à été supprimé');
            return $this->redirect(['prefix' => 'admin', 'controller' => 'articles', 'action' => 'index']);
        }
    }
}