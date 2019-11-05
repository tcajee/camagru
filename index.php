<?php

// require_once('./config/Setup.php');

spl_autoload_register(function ($class_name) {
    if (file_exists('Classes/' . $class_name . '.php'))
        require_once('Classes/' . $class_name . '.php');
    else if (file_exists('Controllers/' . $class_name . '.php'))
        require_once('Controllers/' . $class_name . '.php');
});

require_once('./Includes/Routes.php');



?>