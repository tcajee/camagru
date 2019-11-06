<?php
    include('auth.php');
    session_start();
    if (!$_GET['login'] || !$_POST['passwd']) {
        $_SESSION['logged_on_user'] = "";
        echo "ERROR\n";
        if (!$_GET['login'])
            echo "Enter Username\n";
        if (!$_GET['Password'])
            echo "Enter Password\n";
    }
    else {
        if (auth($_GET['login'], $_POST['passwd']) === TRUE) {
            $_SESSION['logged_on_user'] = $_GET['login'];
            echo "OK\n";
        } else {
            $_SESSION['logged_on_user'] = "";
            echo "ERROR\n";
            echo "No user by that name exists\n";
        }
    }
?>