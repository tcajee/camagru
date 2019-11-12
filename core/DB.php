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
            $this->_pdo = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
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
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($count, $param);
                    $count++;
                }
            }
            if ($this->_query->execute()) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function insert($table, $fields = []) {
        $fieldString = '';
        $valueString = '';
        $values = [];
        foreach ($fields as $field => $value) {
            $fieldString .= '`' . $field . '`,';
            $valueString .= '?,';
            $values[] = $value;
        }
        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        if (!$this->query($sql, $values)->error()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table, $id, $fields = []) {
        $fieldString = '';
        $values = [];
        foreach ($fields as $field => $value) {
            $fieldString .= ' ' . $field . '= ?,';
            $values[] = $value;
        }
        $fieldString = rtrim(trim($fieldString), ','); 
        $sql = "UPDATE {$table} SET {$fieldString} WHERE id = {$id}";
        if (!$this->query($sql, $values)->error()) {
            return true;
        } else {
            return false;
        }
    }

    public function error() {
        return $this->_error;
    }
}