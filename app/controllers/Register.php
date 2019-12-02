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
        $this->errors = []; 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $vpassword = $_POST['vpassword'];
        $email = $_POST['email'];
        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

        $this->check($check = $this->_validate->check(['username', $username]));
        $this->check($check = $this->_validate->check(['password', $password]));
        $this->check($check = $this->_validate->check(['email', $email]));
        $this->check($check = $this->_validate->check(['match', $password, $vpassword]));
        if (!$this->errors) {
            $fields = ['username'=>$username, 'email'=>$email, 'pass'=>password_hash($password, PASSWORD_BCRYPT), 'token'=>$token]; 
            $this->_db->insert('users' , $fields);
            $link = "<a href='http://127.0.0.1:8080/Camagru_git/register/verify/" . $token . "'> Verify </a>";
            $this->email(1, $email, $link);
        } else {
            var_dump($this->errors);
        }
    }

    public function email($id, $email, $link) {
        $subject = "Email verification | Camagru";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= 'From:noreply@camagru.wtc.hi' . "\r\n";
        $text = "Hello! \n\nPlease follow the link to verify your account with Camagru: " . $link; 
        if (mail($email, $subject, $text, $headers)) {
            echo $link;
            echo "sent";
            $this->view->render('verify');
        }
        else {
            echo "not sent";
        }
    }

 
    public function logout() {
        unset($_SESSION['user']);
        Router::redirect('home');
    }

    public function verify($token) {
        $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$token])->results()[0]->id;
        $fields = ['verified' => 1];
        $this->_db->update('users', $id, $fields);
        Router::redirect('login');
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