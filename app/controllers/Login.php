<?php

class Login extends Controller {

    private $_db;

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        $this->_validate = new Validate();
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);

        if ($this->_db->query('SELECT username FROM users WHERE username = ?', ['username' => $username])) {
            if (password_verify($hash, $this->_db->query('SELECT password FROM users WHERE password = ?'), ['password' => $hash])) { 
                echo 'Logged in!';
            } else {
                echo 'Incorrect Password!';
            }
        } else {
            echo 'Username not registered!';
        }
    }
 
	public function index() {
       $this->view->render('login');
    }
}
