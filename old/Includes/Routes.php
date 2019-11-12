<?php

Route::set('index.php', function() {

	Index::CreateView('Index');
});

Route::set('register', function() {
    Register::CreateView('Register');
    Register::test();
    Register::Verify_username();
    Register::Verify_email();
    Register::Verify_passwd();
    // Register::CreateView('Login');

});

Route::set('contact', function() {

    Contact::CreateView('Contact');
});

?>