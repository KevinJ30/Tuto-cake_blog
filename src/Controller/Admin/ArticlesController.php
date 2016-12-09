<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

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

}