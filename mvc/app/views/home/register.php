<?php

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $hash = hash('sha256', $_POST['password']);

    if (!Database::query('SELECT name FROM users WHERE name=:username', array(':username' => $username))) {
        Database::query('INSERT INTO users VALUES (id, :username, :email, hash)', array(':username' => $username, ':email' => $email, 'hash' => $hash)); 
        echo "User added";
    } else {
        echo "User $username exists";
    }

}
?>

<h1>Register</h1>
<form action="index.php" method="post">
    <input type="text" name="username" value="" placeholder="Username"><p />
    <input type="password" name="password" value="" placeholder="Password"><p />
    <input type="email" name="email" value="" placeholder="x@x.x"><p />
    <input type="submit" name="register" value="Register">
</form>
