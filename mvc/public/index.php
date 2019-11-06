<?php

// require_once('../app/core/config/setup.php');

spl_autoload_register(function ($class_name) {
    if (file_exists('../app/core/classes/' . $class_name . '.php'))
        require_once('../app/core/classes/' . $class_name . '.php');
    else if (file_exists('../app/controllers/' . $class_name . '.php'))
        require_once('../app/controllers/' . $class_name . '.php');
});

// require_once('../app/core/config/routes.php');

require_once('../app/init.php');

$app = new App;

function isLoggedIn() {

    if (isset($_COOKIE['SNID']))  {
        if (Database::query('SELECT user FROM tokens WHERE token=:token', array(':token' => sha1($_COOKIE['SNID'])))) {
            $user = Database::query('SELECT user FROM tokens WHERE token=:token', array(':token' => sha1($_COOKIE['SNID'])))[0]['user'];
            return user;
        }
    }
    return false;
}

if (isLoggedIn()) {
    echo "Logged in";
} else {
    echo "Not logged";
}

?>



