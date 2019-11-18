<?php

class Controller extends Database {

    /* public function view($view, $data = []) { */
        
 public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        // die('Welcome to Home/index');
    }

}