<?php

class Gallery extends Controller {
    
    public $_db;

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function index() {
    $this->view->render('gallery');
    }

}