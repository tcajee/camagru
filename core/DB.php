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
            dump("Constructing instance of class BD with no parameters:    ");
        try {
            dump("Constructing instance of class PDO with parameters:    ", [$this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD]);
            $this->_pdo = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        dump("Getting instance of class DB:    ");
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = []) {
        dump("Querying database from class DB with statement " . $sql . " and paramaters: ", $params);
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
                dump("Executing query");
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                dump("Failed to execute query");
                $this->_error = true;
            }
        }
        return $this;
    }

    protected function _read($table, $params = []) {
        dump("Creating read query for table: " . $table . " with paramaters:    ", $params);
        $conditionString = '';
        $bind = [];
        $order = '';
        $limit = '';
        if (isset($params['conditions'])) {
            if (is_array($params['conditions'])) {
                foreach ($params['conditions'] as $condition) {
                    $conditionString .= ' ' . $condition . ' AND';
                }
                $conditionString = rtrim(trim($conditionString), ' AND'); 
            } else {
                $conditionString = $params['conditions'];
            }
            if ($conditionString != '') {
                $conditionString = ' WHERE ' . $conditionString;
            }
        }
        if (array_key_exists('bind',$params)) {
            $bind = $params['bind'];
        }
        if (array_key_exists('order',$params)) {
            $order = ' ORDER BY ' .$params['order'];
        }
        if (array_key_exists('limit',$params)) {
            $limit = ' LIMIT ' .$params['limit'];
        }
        $sql = "SELECT * FROM {$table}{$conditionString}{$order}{$limit}";
        if ($this->query($sql, $bind)) {
            if (!count($this->_result)) {
                dump("Returning false based on: " . count($this->_result));
                return false;
            }
            dump("Selected from table " . $table . " with paramaters:    ", [$sql, $bind]);
            return true;
        }
        dump("Failed to query DB");
        return false;
    }

    public function find($table, $params = []) {
        dump("Finding in table" . $table . "    ", $params);
       if ($this->_read($table, $params)) {
           return $this->results();
       }
       return false;
    }
    
    public function findFirst($table, $params = []) {
       dump("Finding first in table" . $table . "    ", $params);
       if ($this->_read($table, $params)) {
           return $this->first();
       }
       return false;
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
        var_dump($fieldString);
        var_dump($valueString);
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        if (!$this->query($sql, $values)->error()) {
            dump("Inserted into table " . $table . " with paramaters:    ", [$sql, $values]);
            return true;
        }
        dump("Failed to insert into table");
        return false;
    }

    public function update($table, $id, $fields = []) {
        dump("Updating " . $id . " in table: " . $table . " targetting: ", $fields);
        $fieldString = '';
        $values = [];
        foreach ($fields as $field => $value) {
            $fieldString .= ' ' . $field . '= ?,';
            $values[] = $value;
        }
        $fieldString = rtrim(trim($fieldString), ','); 
        $sql = "UPDATE {$table} SET {$fieldString} WHERE id = {$id}";
        if (!$this->query($sql, $values)->error()) {
            dump("Updated successfully");
            return true;
        }
        dump("Failed to update");
        return false;
    }

    public function delete($table, $id) {
        dump("Deleting id[" . $id .  "] from  table: " . $table);
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        if (!$this->query($sql)->error()) {
            dump("Deleted " . $id);
            return true;
        }
        dump("Failed to delete " . $id);
        return false;
    }

    public function results() {
        dump("Fetching results");
        return $this->_result;
    }

    public function first() {
        dump("Fetching first result");
        return (!empty($this->_result[0])) ? $this->_result[0] : [];
    }

    public function count() {
        dump("Count = " .$this->_count);
        return $this->_count;
    }

    public function lastId() {
        dump("Last insert ID = " . $this->_lastInsertID);
        return $this->_lastInsertID;
    }
    
    public function getColumns($table) {
        dump("Fetching columns from " . $table);
        return $this->query("SHOW COLUMNS FROM {$table}")->results();
    }

    public function error() {
        dump("Error:    ", $this->error);
        return $this->_error;
    }
}