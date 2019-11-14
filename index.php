<?php

// require_once('./config/setup.php');


define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// Load config
require_once(ROOT . DS. 'config' . DS . 'config.php');
require_once(ROOT . DS. 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');
dump("Loaded config files" . "<br>");

// Autoload classes
function autoload($className) {
    if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
        dump("required: " . ROOT . DS . 'core' . DS . $className . '.php' . "<br>");
    } else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php'); 
        dump("required: " . ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php' . "<br>");
    } else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php'); 
        dump("required: " . ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php' . "<br>");
    }
}

spl_autoload_register('autoload');

session_start();
dump("Session start" . "<br>");

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];    

if (!Session::exists(SESSION_NAME) && Cookie::exists(REMEMBER_ME)) {
    User::loginCookie();
    echo "logging in from cookie" . "<br>";
}

// Routing
dump("Routing: ", $url);
Router::route($url);