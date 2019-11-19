<?php

 require_once('./config/setup.php');
//phpinfo();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// Load config
require_once(ROOT . DS. 'config' . DS . 'config.php');
require_once(ROOT . DS. 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

// Autoload classes
function autoload($className) {
    if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php'); 
    } else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php'); 
    }
}

spl_autoload_register('autoload');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

if (!Session::exists(SESSION_NAME) && Cookie::exists(REMEMBER_ME)) {
    User::loginCookie();
    echo "logging in from cookie";
}


// You will need this to send out emails and to help with refresh rates In your mamp file, go to:
// php⁩ > etc > php.ini

// Comment:
// [opcache]
// opcache.enable=1
// opcache.enable_cli=0
// opcache.memory_consumption=128
// opcache.interned_strings_buffer=8
// opcache.max_accelerated_files=10000
// opcache.revalidate_freq=60
// opcache.fast_shutdown=1
// UnComment:
// [mail function]
// sendmail_path = "env -i /usr/sbin/sendmail -t -i"
// (this helps with sending out confirmation emails, P.S - if it doesn't send to your student account, try using mailinator )
// OR
// If your mamp is on your desktop, you can replace all the absolute paths with:
// USERNAME with your username
// FILENAME with what you named your mamp file.
// php.ini


// Routing
//$url[0] = "register";
//$url[1] = "login";
Router::route($url);