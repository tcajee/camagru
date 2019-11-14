<?php

class UserSessions extends Model {

    public function __construct() {
        dump("Constructing instance of class UserSessions with no parameters:    ");
        $table = 'sessions';
        parent::__construct($table);
    }

}