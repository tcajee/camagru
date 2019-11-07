<?php

class Index extends Controller {

	public function index($name = 'Guest') {

		$user = $this->model('User');
		$user->name = $name;

		$this->view('home/index', ['name' => $user->name]);
	}
}