<?php

class Users extends Model {

    private $_isLoggedIn;
    private $_sessionName;
    private $_cookieName;

    public static $loggedIn;

    public function __construct($user = '') {
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = SESSION_NAME;        
        $this->_cookieName = REMEMBER_ME;        
        $this->_softDelete = true;
        if ($user != '') {
            if (is_int($user)) {
                $u = $this->_db->findFirst('users', ['conditions'=>'id = ?', 'bind'=>[$user]]);
            } else {
                $u = $this->_db->findFirst('users', ['conditions'=>'username = ?', 'bind'=>[$user]]);
            }
            if ($u) {
                foreach ($u as $key => $value) {
                    $this->key = $value;
                }
            }
        }
    }

    public function findByUsername($username) {
        return $this->findFirst(['conditions'=>'username = ?', 'bind'=>[$username]]);
    }

    public static function currentUser() {
        if (!isset(self::$loggedIn) && Session::exists(SESSION_NAME)) {
            $user = new Users((int)Session::get(SESSION_NAME));
            self::$loggedIn = $user;
        }
        return self::$loggedIn;
    }

    public function login($rememberMe = false) {
        Session::set($this->_sessionName, $this->id);
        if ($rememberMe) {
            $hash = md5(uniqid() + rand(0, 100));
            $user_agent = Session::uagent_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_EXPIRY);
            $fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
            $this->_db->query("DELETE FROM sessions WHERE user = ? AND agent = ?", [$this->id, $user_agent]);
            $this->_db->insert('session', $fields);
        }
    }

    public function logout() {
        $user_agent = Session::uagent_version();
        $this->_db->query("DELETE FROM sessions WHERE user = ? AND agent = ?", [$this->id, $user_agent]);
        Session::delete(SESSION_NAME);
        if (Cookie::exists(REMEMBER_ME)) {
            Cookie::delete(REMEMBER_ME);
        }
        self::$loggedIn = null; 
        return true;
    }
}
