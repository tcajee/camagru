<?php


//require_once('./config/setup.php');

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
// --------------------------------------------------

//$DB_DSN = 'mysql:hostname=127.0.0.1;dbname=camagru';
//$DB_USER = 'root';
//$DB_PASSWORD = '';
//try {
//    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//}
//catch (PDOException $e) {
//    echo 'Connection to database failed: ' . $e->getMessage();
//}
//$sql = "INSERT INTO comments (`post`, `user`, `text`) VALUES (1, 1, 'INDEX');";
//function execute($sql, $pdo){
//    try {
//        $db = $pdo->prepare($sql);
//        $db->execute();
//    } catch(PDOException $e) {
//        die($e->getMessage());
//    }
//}
//execute($sql, $pdo);






//$db = DB::getInstance();
//$db->insert('comments', ['post'=>'1', 'user'=>'1', 'text'=>'FUCK']);
//die();
// --------------------------------------------------

session_start();
spl_autoload_register('autoload');

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

if (!Session::exists(SESSION_NAME) && Cookie::exists(REMEMBER_ME)) {
    User::loginCookie();
    echo "logging in from cookie";
}

// Routing
$url[0] = "register";
$url[1] = "login";
Router::route($url);