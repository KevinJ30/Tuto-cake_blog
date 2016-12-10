<?php

namespace App\View\Cell;

use Cake\View\Cell;

class CategorieCell extends Cell{

    public function display(){
        $this->loadModel('Categories');
        $categories = $this->Categories->find()->order('id desc');
        $this->set('categories', $categories);
    }

}