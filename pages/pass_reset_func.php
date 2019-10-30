<?php
include("auth.php");

if ($_POST['new_passwd'] !== $_POST['new_passwd_re'])
    {
        header("Location: pass_reset_no_match.php");
        exit;

    }
if ($_POST['new_passwd'] === $_POST['new_passwd_re']) //&& pass_auth($_POST['new_passwd']) == TRUE)
{
    echo $_POST['new_passwd']."\n";
    echo $_POST['new_passwd_re'];
}
?>
