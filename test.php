<?php
  phpinfo();
?>


# This is the old login function
<!-- <?php
    include('auth.php');
    session_start();
    if (!$_GET['login'] || !$_GET['passwd'])
    {
        $_SESSION['logged_on_user'] = "";
        echo "ERROR\n";
        if (!$_GET['login'])
            echo "Enter Username\n";
        if (!$_GET['login'])
            echo "Enter Password\n";
    }
    else
    {
        if (auth($_GET['login'], $_GET['passwd']) === TRUE)
        {
            $_SESSION['logged_on_user'] = $_GET['login'];
            echo "OK\n";
        }
        else
        {
            $_SESSION['logged_on_user'] = "";
            echo "ERROR\n";
            echo "No user by that name exists\n";
        }
    }
?> -->
