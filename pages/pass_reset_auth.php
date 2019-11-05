<?php
    function pass_reset_auth($user, $newpasswd)
    {
        if ($user == NULL || $passwd == NULL)
        {
            return FALSE;
        }
        $usr['user'] = $user;
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
                if ($usr_pw_pair['user'] === $usr['user'] && $usr_pw_pair['passwd'] === $usr['passwd'])
                {
                    echo("Welcome \n");
                    return TRUE;
                }
            }

        }
        echo "No user by that name exists\n";
        return FALSE;
    }
?>
