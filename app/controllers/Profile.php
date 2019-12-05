<?php

class Profile extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        if (!isset($_SESSION['user'])) {
            Router::redirect('');
        }
    }

    public function index() {
       $this->view->render('profile');
    }
}
