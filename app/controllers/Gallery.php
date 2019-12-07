<?php

class Gallery extends Controller {
    
    public $_db;
   
    public $images;
    public $count;
    
    public $next = [];
    public $current = [];
    public $all = [];
    public $prev = [];
    public $n;

    public function __construct($controller, $action) {
        // if (!isset($_SESSION['user'])) {
            // Router::redirect('');
            // return;
        // }
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function setup() {
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        $this->n = count($this->images);
        $this->i = 0;
        $this->all = $this->images;
        
        if ($this->n >= 5) {
            $this->current = array_slice($this->images, $this->i, 5);
            $this->i += 5;
            // if ($this->n >= 10) {
                // $this->next = array_slice($this->images, $this->i, 5);
            // } else {
                // $this->next = array_slice($this->images, $this->i, $this->n - 5);
            // }
            // $this->prev = $this->current;
        } else {
            $this->current = $this->all;
            $this->next = [];
            $this->prev = [];
            $this->i += count($this->all);
        }
    }

    public function load() {
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        $this->n = count($this->images);
        $this->all = $this->images;
        if (isset($_POST['next']) && $_POST['next']) {
            if ($this->n - $_POST['count'] < 5) {
                $_POST['count'] = 0;
            }
            $this->next($_POST['count']);
            // var_dump($_POST['count']);
        } else if (isset($_POST['prev']) && $_POST['prev']) {
            if ($_POST['count'] + $this->n * -1 > 0) {
                $_POST['count'] = $this->n;
            } 
            $this->prev($_POST['count']);
            // var_dump($_POST['count']);
        }
    }

    public function display($imgs = []) {
        if ($imgs) {
            if ($imgs[0]->img) {
                $a = $imgs[0]->img;
                echo "<img src=$a style='width: 30%'><p></p>";
            }
            if ($imgs[1]->img) {
                $b = $imgs[1]->img; 
                echo "<img src=$b style='width: 30%'><p></p>";
            }
            if ($imgs[2]->img) {
                $c = $imgs[2]->img; 
                echo "<img src=$c style='width: 30%'><p></p>";
            }
            if ($imgs[3]->img) {
                $d = $imgs[3]->img; 
                echo "<img src=$d style='width: 30%'><p></p>";
            }
            if ($imgs[4]->img) {
                $e = $imgs[4]->img; 
                echo "<img src=$e style='width: 30%'><p></p>";
            }
        } else if ($this->all){
            foreach ($this->all as $img) {
                echo "<img src=$img->img style='width: 30%'><p></p>";
            }
        }
    }

    public function next($count) {
        $this->next = array_slice($this->images, $count, 5);

        if ($this->next) {
            $this->display($this->next);
            unset($_POST['next']);
        } else {
            $this->prev = array_slice($this->images, $count - 5, 5);
            $this->display($this->next);
        }
    }

    public function prev($count) {
        $this->prev = array_slice($this->images, $count - 5, 5);
        if ($this->prev) {
            $this->display($this->prev);
            unset($_POST['prev']);
        } else {
            $this->prev = array_slice($this->images, $count + 5, 5);
            $this->display($this->prev);
        }
    }

    public function index() {
        $this->view->render('gallery');
    }

}