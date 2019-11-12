<?php

class Model { 

    protected $_db;
    protected $_table;
    protected $_modelName;
    protected $_columnNames = [];
    protected $_softDelete = false; 

    public $id;

    public function __construct($table) {
        $this->_db = DB::__construct();
        $this->_table = $table;
        $this->_setTableColumns();
        $this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }

    protected function _setTableColumns() {
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            $this->_columnNames[] = $column->Field;
            $this->{$columnName} = null;
        }
    }

    public function getColumns() {
        return $this->_db->getColumns($this->_table);
    }
    
    public function find($params = []) {
        $results = [];
        $resultsQuery = $this->_db->find($this->_table, $params);
        foreach ($resultsQuery as $result) {
            $obj = new $this->_modelName($this->_table);
            $obj = fillObj($result); 
            $results[] = $obj;
        }
        return $results;
    }
    
    public function findFirst($params = []) {
        $resultsQuery = $this->_db->findFirst($this->_table, $params);
        $result = new $this->_modelName($this->_table);
        $result = fillObj($resultQuery); 
        return $results;
    }

    public function findById($id) {
        return $this->findFirst(['conditions'=>"id = ?", 'bind' => [$id]]);
    }

    protected function fillObj($result) {
        foreach ($result as $key => $value) {
            $this->$conditiokey = $value;
        }
    }
}