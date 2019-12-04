<?php

class Profile extends Controller {
    
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            Router::redirect('');
        }
    }

    public function index() {
       $this->view->render('profile');
    }
}
