<?php

class Cookie {

    public static function set($name, $value, $expiry) {
        if (setcookie($name, $value, time() + $expiry, '/')) {
            dump("Cookie set with paramaters: ", [$name, $value, time() + $expiry]);
            return true;
        }
        dump("Failed to set cookie with paramaters: ", [$name, $value, time() + $expiry]);
        return false;
    }

    public static function delete($name) { 
        self::set($name, '', time() - 1);
        dump("Cookie " . $name . " unset");
    }
    
    public static function get($name) { 
        dump("Cookie " . $name . " fetch");
        return $_COOKIE[$name];
    }
    
    public static function exists($name) { 
        dump("Cookie " . $name . " exists");
        return isset($_COOKIE[$name]);
    }
}