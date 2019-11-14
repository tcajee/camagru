<?php

class Input {

    public static function sanitize($dirty) {
        dump("Sanitized: " . $dirty . " to: ", htmlentities($dirty, ENT_QUOTES, 'UTF-8'));
        return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    }

    public static function get($input) {
        if (isset($_POST[$input])) {
            return self::sanitize($_POST[$input]);
        } else if (isset($_GET[$input])) {
            return self::sanitize($_GET[$input]);
        }
    }
}
