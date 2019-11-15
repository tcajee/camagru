<?php

class Application { 

    public function __construct() {
        dump("Constructing instance of class Application with no parameters:   ");
        $this->_set_reporting();        
        $this->_unregister_globals();        
    }

    private function _set_reporting() {
        dump("Setting reporting: ");
        if (DEBUG) {
            dump("  Debugging on");
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        } else {
            dump("  Debugging off");
            error_reporting(0);
            ini_set('display_errors', 0);
            ini_set('log_errors', 1);
            ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
        } 
    }
    
    private function _unregister_globals() {
        dump("  Unregistering globals");
        if (ini_get('register_globals')) {
            $globalsArray = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach ($globalsArray as $global) {
                foreach ($GLOBALS[$global] as $key => $value) {
                    if ($GLOBALS[$key] === $value) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}