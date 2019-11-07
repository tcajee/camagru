<?php

Route::set('index.php', function() {

	Index::view('Index_View');
});

Route::set('setup', function() {

	Setup::view('Setup_View');
});

Route::set('register', function() {

    Register::view('Register_View');
});

Route::set('login', function() {

    Login::view('Login_View');
});


Route::set('logout', function() {

    Login::view('Logout_View');
});

?>