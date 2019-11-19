<?php

class Register extends Controller {

    private $_db;
    private $_validate;

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        $this->_validate = new Validate();
    }

    public $errors = [];

    public function register() {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $vpassword = $_POST['vpassword'];
        $email = $_POST['email'];
        
        $this->check($check = $this->_validate->check(['username', $username]));
        $this->check($check = $this->_validate->check(['password', $password]));
        $this->check($check = $this->_validate->check(['email', $email]));
        $this->check($check = $this->_validate->check(['match', $password, $vpassword]));
        if (!$this->errors) {
            $fields = ['username'=>$username, 'email'=>$email, 'password'=>password_hash($password, PASSWORD_BCRYPT)]; 
            $this->_db->insert('users' , $fields);
            echo "User added";
        } else {
            var_dump($this->errors);
        }

    }

    public function check($check) {
        if (!$check[0]) {
            $this->errors[] = $check[1];
        }
    }

    public function index() {
       $this->view->render('register');
    }
}