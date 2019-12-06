<?php

class Gallery extends Controller {
    
    public $_db;

    public function __construct($controller, $action) {
        if (!isset($_SESSION['user'])) {
            Router::redirect('');
            return;
        }
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function load() {
    //   $dir = PROOT . "img";
      $dir = ROOT . DS . 'img';
      if (is_dir($dir)) {
          if($dd = opendir($dir)) {
              while (($f = readdir($dd)) !== false)
                  if ($f != "." && $f != "..")
                      $files[] = $f;
              closedir($dd);
          } 
        $n = $_POST["n"];
        $response = "";
        for ($i = $n; $i < $n + 9; $i++) {
            $response = $response.$files[$i%count($files)].';';
        }
        echo $response;
      }
      
    }

    public function index() {
        $this->view->render('gallery');
    }

}