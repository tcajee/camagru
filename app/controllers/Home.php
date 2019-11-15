<?php

class Home extends Controller {
    
    public function __construct($controller, $action) {
        dump("constructing instance of class Home with paramaters:  ", [$controller, $action]);
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        dump("rendering view: home/index");
       $this->view->render('home/index');
    }
}