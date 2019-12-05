<?php

class Settings extends Controller {
    
    public $_db;
    private $_validate;
    public $errors = [];
    private $checked;

    public function __construct($controller, $action) {
        if (!isset($_SESSION['user'])) {
            Router::redirect('');
            return;
        }
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
        $this->_validate = new Validate();
    }

    public function check($check) {
        if (!$check[0]) {
            $this->errors[] = $check[1];
        }
    }

    public function index() {
        $this->view->render('settings');
    }

    public function logout() {
        unset($_SESSION['user']);
        Router::redirect('');
    }

    public function upload() {
        if (isset($_FILES['image'])) {

            $errors = [];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = explode('.', $_FILES['image']['name']);
            $file_ext = strtolower(end($file_ext));

            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext,$extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, ROOT . DS . 'img' . DS . 'profile' . DS . $file_name);

                $save = 'img' . DS . 'profile' . DS . $file_name;
                $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
                $fields = ['photo'=>$save];
                $this->_db->update('users', $id, $fields);
                Router::redirect('settings');
            } else {
                print_r($errors);
            }
        }
    }

    public function names() {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
        $fields = ['fname'=>$fname, 'lname'=>$lname];
        $this->_db->update('users', $id, $fields);
        Router::redirect('settings');
    }

    public function update_email() {

        $email = $_POST['update_email'];
        $this->check($check = $this->_validate->check(['email', $email]));
        if (!$this->errors) {
		$id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
        $fields = ['email'=>$email];
        $this->_db->update('users', $id, $fields);
        Router::redirect('settings');
        }
        else {
            echo implode(",", $this->errors);
        }

    }

    public function pass() {

        $pass = $_POST['password'];
        $vpass = $_POST['vpassword'];
        
        $this->check($check = $this->_validate->check(['password', $pass]));
        $this->check($check = $this->_validate->check(['match', $pass, $vpass]));

        if (!$this->errors) {
            $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
            $fields = ['pass'=>password_hash($pass, PASSWORD_BCRYPT)];
            $this->_db->update('users', $id, $fields);
            unset($_SESSION['user']);
            // Router::redirect('login');
        }
        else {
            echo implode(",", $this->errors);
        }
    }

    public function notify() {

        $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;

        if (!empty($_POST['notifications'])) {
            $fields = ['notify'=>1];
            $this->_db->update('users', $id, $fields);
            Router::redirect('settings');
        }
        else {
            $fields = ['notify'=>0];
            $this->_db->update('users', $id, $fields);
            Router::redirect('settings');
        }
    }
}
