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
            $this->verify(1, "d1225932@urhen.com", "link");
        } else {
            var_dump($this->errors);
        }

    }


    // $email = Input::get('email');
    // $u_name = Input::get('u_name');
    // $subject = 'Signup | Verification';
    // $message = 'Thank you for registering. Please click the link to verify your registration:';
    // $message .= "<a href='http://localhost:8080/Camagru/confirm.php?user=$u_name&salt=$salt'>Confirm Account</a>";
    // $headers .= "Content-Type:text/html;charset=UTF-8". "\r\n";
    // mail($email, $subject, $message, $headers);


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
            echo "sent";
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