<?php

class Home extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
       $db = DB::getInstance(); 
       $sql = "SELECT * FROM users";
       $contacts = $db->query($sql);
       dnd($contacts);
        $this->view->render('home/index');
    }
}