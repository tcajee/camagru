<?php

class Controller extends Database {

	/* public function view($view, $data = []) { */
    public static function view($view) {
        require_once("./Views/$view.php");
    }
	
     public function model($model) {

        require_once("./Models/$model.php");
		return new $model();
	 }
}
