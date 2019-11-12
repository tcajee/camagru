<?php

class Home extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
       $db = DB::getInstance(); 
       $find = $db->find('users', [
           'conditions' => ['username = ?'],
           'bind' => ['admin'],
        //    'order' => "username",
        //    'limit' => 2
       ]);
       dnd($find);
       $this->view->render('home/index');
    }
}