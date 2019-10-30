<?php
    function pass_reset_auth($login, $newpasswd)
    {
        if ($login == NULL || $passwd == NULL)
        {   
            return FALSE;
        }
        $usr['login'] = $login;
        $usr['passwd'] = hash("sha512", $passwd);

        if (!file_exists("../private"))
        {
            echo "Please create an account\n";
            return FALSE;
        }
        $usr_array = unserialize(file_get_contents("../private/passwd"));
        if ($usr_array)
        {
            foreach ($usr_array as $usr_pw_pair)
            {
                if ($usr_pw_pair['login'] === $usr['login'] && $usr_pw_pair['passwd'] === $usr['passwd'])
                {
                    echo("Welcome ".$usr['login']."\n");
                    return TRUE;
                }
            }

        }
        echo "No user by that name exists\n";
        return FALSE;
    }
?>