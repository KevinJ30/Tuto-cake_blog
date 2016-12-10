<?php

namespace App\Controller;

class ArticlesController extends AppController{

    /**
     * Affiche la liste des articles du blog
     **/
    public function index(){
        $articles = $this->Articles->find()->contain(['Categories'])->order(['created desc']);
        $this->set('articles', $articles);
    }
}