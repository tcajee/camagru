<?php

class Login extends Controller {

	public static function isLoggedIn() {

		if (isset($_COOKIE['SNID']))  {
			if (Database::query('SELECT user FROM tokens WHERE token=:token', array(':token' => sha1($_COOKIE['SNID'])))) {
				return Database::query('SELECT user FROM tokens WHERE token=:token', array(':token' => sha1($_COOKIE['SNID'])))[0]['user'];
			}
		}
		return false;
	}

	public function logout() {

		if (!Login::isLoggedIn()) {
			die("Not logged in");
		}

		if (isset($_POST['logout'])) {
			if (isset($_COOKIE['SNID'])) {
				Database::query('DELETE FROM tokens WHERE user=:user', array(':user' => Login::isLoggedIn()));
			}
			setcookie('SNID', '1', time() - 1);
		}
	}
}
