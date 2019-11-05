<?php

Route::set('index.php', function() {

	Index::CreateView('Index');


});

Route::set('about', function() {

     About::CreateView('About');
     About::test();

});

Route::set('contact', function() {

    Contact::CreateView('Contact');

});

Route::set('registration.php', function() {

    Contact::CreateView('Registration');

});
?>
