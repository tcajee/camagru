<?php

class UserSessions extends Model {

    public function __construct() {
        $table = 'sessions';
        parent::__construct($table);
    }
}