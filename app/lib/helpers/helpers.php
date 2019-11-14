<?php

function dnd($data) {

    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function dump($text, $data = '') {

    echo '<pre>';
    echo $text;
    if ($data != '')
        var_dump($data);
    echo '</pre>';
}

function sanitize($dirty) {
    return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function currentUser() {
    return Users::currentUser();
}