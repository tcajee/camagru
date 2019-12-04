<?php

class Settings extends Controller {

    public $_db;
    private $_validate;
    public $errors = [];

    public function __construct($controller, $action) {
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
        Router::redirect('home');
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
        if (!$this->errors)
		$id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
        $fields = ['email'=>$email];
        $this->_db->update('users', $id, $fields);
        Router::redirect('settings');

    }

    public function update_pass() {

        $pass = $_POST['pass_update'];
        $vpass = $_POST['vpass_update'];

        $this->check($check = $this->_validate->check(['password', $pass]));
        $this->check($check = $this->_validate->check(['match', $pass, $vpass]));

        if (!$this->errors) {
        $id = $this->_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
        $fields = ['pass'=>password_hash($pass, PASSWORD_BCRYPT)];
        $this->_db->update('users', $id, $fields);
        Router::redirect('settings');
        }
        else {
            echo 'NOOO!!!';
        }
    }
}
