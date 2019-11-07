<?php

class Controller extends Database{

	/* public function view($view, $data = []) { */
    public static function view($view) {
        require_once("../views/$view.php");
    }
	
     public function model($model) {

		require_once '../models/' . $model . '.php';
		return new $model();
	 }
}
