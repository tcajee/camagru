<?php

class App {

	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct() {
	
        // print_r($url = $this->parseUrl());
        $url = $this->parseUrl();
        
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once('../app/controllers/' . $this->controller . '.php');
        
        // echo $this->controller;
    }

	public function parseUrl() {
		
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
?>
