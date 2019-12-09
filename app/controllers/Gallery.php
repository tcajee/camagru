<?php

class Gallery extends Controller {
    
    public $_db;
   
    // public $all = [];
    public $images;
    public $ret = 0;
    public $n = 0;
    public $start = [];
    public $next = [];
    public $prev = [];

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function setup() {
        $all = [];
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        foreach ($this->images as $img) {
            $all[] = $img->img; 
        }
        $this->n = count($all);
        $i = $_POST['count'];
        $count = 5;
        if (isset($_POST['start']) && $_POST['start']) {
            
            while ($i < $this->n - 1 && $count) {
                // echo "<img src=$out style='width: 30%'><p></p>";
                echo "<img src='" . $all[$i] . "' style='width: 25%'><p></p>";
                $i++;
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        }
    } 

    // public function display($imgs = [], $likes, $comments = []) {
    public function display() {
        $all = [];
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        foreach ($this->images as $img) {
            $all[] = $img->img; 
        }
        $this->n = count($all);
        $i = $_POST['count'];
        $count = 5;
        if (isset($_POST['next']) && $_POST['next']) {
           
            while ($i < $this->n && $count) {
                // echo "<img src=$out style='width: 30%'><p></p>";
                echo "<img src='" . $all[$i] . "' style='width: 25%'><p></p>";
                $i++;
                if ($i == $this->n) {
                    $i = 0;
                }
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        } else if (isset($_POST['prev']) && $_POST['prev']) {
            if ($i == $this->n) {
                $i--;
            }
           
            while ($i >= 0 && $count) {
                // echo "<img src=$out style='width: 30%'><p></p>";
                echo "<img src='" . $all[$i] . "' style='width: 25%'><p></p>";
                if ($i == 0) {
                    $i = $this->n;
                }
                $i--;
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        } else {
            echo "<p>No photos</p>";
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . 0 . "</p>";
        }
        unset($_POST['prev']);
        unset($_POST['next']);
    }

    public function index() {
        $this->view->render('gallery');
    }

}