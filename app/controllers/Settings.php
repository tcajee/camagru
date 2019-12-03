<?php

class Settings extends Controller {
 
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        var_dump($this);
    }

    public function index() {
    $this->view->render('settings');
    }
    
}
