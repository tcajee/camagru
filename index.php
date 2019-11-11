<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
   
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];    

require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');

    
    
    // $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    // var_dump($url);
    // if (isset($_SERVER['PATH_INFO'])) {
    //    echo $_SERVER['PATH_INFO'];
    // }
    // echo $_SERVER['REQUEST_URL'];

    

// spl_autoload_register(function($class_name) {
//     if (file_exists('./classes/' . $class_name . '.php'))
//         require_once("./classes/$class_name.php");
//     else if (file_exists('./Controllers/' . $class_name . '.php'))
//         require_once("./Controllers/$class_name.php");
// });

// require_once("./config/routes.php");
// require_once("./config/setup.php");