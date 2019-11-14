<?php

class Session {

    public static function exists($name) {
        dump("Session " . $name . " exists: ", isset($_SESSION[$name]) ? true : false);
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function get($name) {
        dump("Session: ", $name);
        return $_SESSION[$name];
    }
    
    public static function set($name, $value) {
        dump("Setting session: ", [$name, $value]);
        return $_SESSION[$name] = $value;
    }
    
    public static function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
        dump("Deleteing session: ", $name);
    }

    public static function uagent_version() {
         $uagent = $_SERVER['HTTP_USER_AGENT'];
         $regex = "/\/[a-zA-Z0-9.]+/";
         $new = preg_replace($regex, '', $uagent);
         dump("User agent: ", $new);
         return $new;
    }
}