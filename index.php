<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// Load config
require_once(ROOT . DS. 'config' . DS . 'config.php');
require_once(ROOT . DS. 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

// Autoload classes
function autoload($className) {
    if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
        // echo(ROOT . DS . 'core' . DS . $className . '.php' . '<br>');
    } else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php'); 
        // echo(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php' . '<br>'); 
    } else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php'); 
    }
}

spl_autoload_register('autoload');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];    

// Routing
Router::route($url);

// $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
// var_dump($url);
// if (isset($_SERVER['PATH_INFO'])) {
//    echo $_SERVER['PATH_INFO'];
// }
// echo $_SERVER['REQUEST_URL'];

// require_once("./config/routes.php");
// require_once("./config/setup.php");