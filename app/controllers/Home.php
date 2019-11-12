<?php

class Home extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
       $db = DB::getInstance(); 
       $fields = [
        'username' => 'TESTING',
        'email' => 'TESTING@testing.com',
       ];
       $contacts = $db->update('users', 8, $fields);
    //    dnd($contacts);
       $this->view->render('home/index');
    }
}