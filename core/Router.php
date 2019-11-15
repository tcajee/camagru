<?php

class Router {
    
    public static function route($url) {

        // Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEF_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);
        
        // Action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $controller;
        array_shift($url);
        
        // Paramaters
        $queryParams = $url;

        $classObject = new $controller($controller_name, $action);

        if (method_exists($controller, $action)) {
            dump("Initiating callback on function array with paramaters:    ", [[$classObject, $action], $queryParams]);
            call_user_func_array([$classObject, $action], $queryParams);
        } else {
            die('Method ' . $action . ' does not exist in controller: ' . $controller);
        }
    }

    public static function redirect($location) {
        if (!headers_sent()) {
            dump("Header sent. Redirecting to", $location);
            sleep(60);
            dump("ABOUT TO REDIRECT");
            header('Location: ' . PROOT . $location);
            dump("REDIRECTED");
            sleep(60);
            dump("ABOUT TO EXIT");
            exit();
        } else {
            dump("No header sent. Doing some javasript BS??");
            sleep(60);
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . PROOT . $location . '";'; 
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
            echo '</noscript>';
            sleep(60);
            dump("ABOUT TO EXIT");
            exit();
        }
    }
}