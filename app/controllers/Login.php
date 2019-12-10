<?php

class Login extends Controller {

    private $_db;
    private $_validate;
    public $errors = [];

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        $this->_validate = new Validate();
    }

    public function login($input = []) {
        $this->errors = []; 
     
        if ($_POST) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $hash = password_hash($password, PASSWORD_BCRYPT);

            if ($username)
            {
                if ($password) {
                    if ($user = $this->_db->query('SELECT username FROM users WHERE username = ?', ['username' => $username])->results()) {
                        $user = $user[0]->username;
                        if ($pass = $this->_db->query('SELECT pass FROM users WHERE username = ?', ['username'=>$username])->results()) {
                            $pass = $pass[0]->pass;
                        }
                        if (password_verify($password, $pass)) { 
                            $_SESSION['user'] = $this->_db->query('SELECT token FROM users WHERE username = ?', ['username'=>$username])->results()[0]->token;
                        } else {
                            echo 'Incorrect Password!';
                        }
                    } else {
                        echo 'Username not registered!';
                    }
                } else {
                    echo 'Please enter a password!';
                } 
            } else {
                echo 'Please enter a username!';
            }
        } else {
            Router::redirect('login');
        }

    }

    public function forgot() {

        if ($_POST) {
            $email = htmlspecialchars(htmlentities($_POST['email'], ENT_QUOTES | ENT_IGNORE, "UTF-8"));
            $pass = '1234567';
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check = $this->_db->query('SELECT email FROM users WHERE email = ?', ['email'=>$email])->results();
                if ($check) {
                    $id = $this->_db->query('SELECT id FROM users WHERE email = ?', ['email'=>$email])->results()[0]->id;
                    $fields = ['pass'=>password_hash($pass, PASSWORD_BCRYPT)];
                    $this->_db->update('users', $id, $fields);
                    $subject = "Password reset | Camagru";
                    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= 'From:noreply@camagru.wtc.hi' . "\r\n";
                    $text = "Hello! \n\n Your password has been reset to: ". $pass; 
                    mail($email, $subject, $text, $headers);
                    echo 'Please check your email!';
                } else {
                    echo "Email address does not exist!";
                }
            } else {
                echo "Please enter a valid email address.";
            }
        } else {
            Router::redirect('login');
        }
    }
 
    public function check($check) {
        if (!$check[0]) {
            $this->errors[] = $check[1];
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        Router::redirect('');
    }
	public function index() {
       $this->view->render('login');
    }
}
