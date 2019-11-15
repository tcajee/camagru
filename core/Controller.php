<?php

class Controller extends Application {

    protected $_controller;
    protected $_action;
    public $view;

    public function __construct($controller, $action) {
        dump("Constructing instance of class Controller with parameters:    ", [$controller, $action]);
        parent::__construct();
        $this->_controller = $controller;
        $this->_action = $action;
        $this->view = new View();
    }

    protected function loadModel($model) {
        if (class_exists($model)) {
            dump("Loading model: ", $model);
            $this->{$model.'Model'} = new $model(strtolower($model));
        }
    }
    
}