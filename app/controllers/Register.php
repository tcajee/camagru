<?php

class Register extends Controller {

    private $_db;
    private $_validate;
    public $errors = [];

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        $this->_validate = new Validate();
    }

    public function register($input = []) {

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
            // $link .= "<a href='http://localhost:8080/Camagru/confirm.php?user=$u_name&salt=$salt'>Confirm Account</a>";
            $this->verify(1, "tcajee@student.wethinkcode.co.za", "link");
        } else {
            var_dump($this->errors);
        }
    }

    public function verify($id, $email, $link) {
        $subject = "Email verification | Camagru";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= 'From:noreply@camagru.wtc.hi' . "\r\n";
        $text = "Hello! \n\nPlease follow the link to verify your account with Camagru: " . $link; 
        if (mail($email, $subject, $text, $headers)) {
            echo "sent";
            $this->view->render('verify');
        }
        else {
            echo "not sent";
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