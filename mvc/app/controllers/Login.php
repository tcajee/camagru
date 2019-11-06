<?php

class Login extends Controller {

	public function index($name = '') {

		$this->view('home/login', []);
	}
}
