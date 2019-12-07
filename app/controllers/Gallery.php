<?php

class Gallery extends Controller {
    
    public $_db;
    public $images;
    public $temp;
    public $n;
    public $i;

    public function __construct($controller, $action) {
        if (!isset($_SESSION['user'])) {
            Router::redirect('');
            return;
        }
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function load() {
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        $this->n = count($this->images);
        $this->i = 0;
        $this->next();
    }

    public function display($imgs = []) {
        $a = $imgs[0]->img;
        $b = $imgs[1]->img; 
        $c = $imgs[2]->img; 
        $d = $imgs[3]->img; 
        $e = $imgs[4]->img; 
        echo "<script language=\"javascript\">
        var clear = document.getElementById('clear');
        clear.innerHTML = '';
        </script>";
        echo "<div id='clear' class='center black padding-32'>
        <img src=$a style='width: 30%'><p></p>
        <img src=$b style='width: 30%'><p></p>
        <img src=$c style='width: 30%'><p></p>
        <img src=$d style='width: 30%'><p></p>
        <img src=$e style='width: 30%'><p></p>
        </div>";

    }

    public function next() {
        $this->temp = array_slice($this->images, $this->i, 5);
        // dnd($this->temp);
        $this->display($this->temp);
        $this->i += 5;
    }

    public function prev() {
        if ($this->i - 5 >= 0) {
            $this->temp = array_slice($this->images, $this->i - 5, 5);
            $this->display($this->temp);
            $this->i -= 5;
        } else {
            $this->load();
        }
    }

    public function index() {
        $this->view->render('gallery');
        $this->load();
    }

}