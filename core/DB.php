<?php

class DB {

    private $DB_DSN = 'mysql:hostname=127.0.0.1;dbname=camagru';
    private $DB_USER = 'root';
    private $DB_PASSWORD = '';

    private static $_instance = null;
    private $_pdo;
    private $_query; 
    private $_error = false;
    private $_result;
    private $_count = 0;
    private $_lastInsertID = null;

    private function __construct() {
        try {
            $this->pdo = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = []) {

        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $count = 1;
            if (count($parms)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($count, $params);
                    $count++;
                }
            }

            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count

                21/70 6:20
            }

        }
    }
}