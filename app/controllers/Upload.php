<?php

class Upload extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function index() {
       $this->view->render('upload');
    }

    public function upload() {
        
        echo "do the upload";
    }


}