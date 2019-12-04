<?php

class Router {
    
    public static function route($url) {

        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEF_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);
        
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
        $action_name = $controller;
        array_shift($url);
       
        // dnd($_SESSION);
        
        // if (!isset($_SESSION['user']) && (!$controller_name == 'login' || !$controller_name == 'register' || !$controller_name == 'home' )) {
        //    $controller = 'home';
        //    $action = '';
        // }
        
  
        $queryParams = $url;

        if (method_exists($controller, $action) && class_exists($controller)) {
            $classObject = new $controller($controller_name, $action);
            call_user_func_array([$classObject, $action], $queryParams);
        } else {
            Router::redirect('');
            // die('Method ' . $action . ' does not exist in controller: ' . $controller);
        }
    }

    public static function redirect($location) {
        if (!headers_sent()) {
            header('Location: ' . PROOT . $location);
            exit();
        } else {
            echo 'JAVASCRIPT??';
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . PROOT . $location . '";'; 
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
            echo '</noscript>';
            exit();
        }
    }
}