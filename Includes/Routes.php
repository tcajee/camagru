<?php

Route::set('index.php', function() {

	Index::CreateView('Index');


});


Route::set('register', function() {

     Register::CreateView('Register');

});

Route::set('contact', function() {

    Contact::CreateView('Contact');

});

?>
