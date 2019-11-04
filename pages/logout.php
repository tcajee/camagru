<?php
    session_start();
    $_SESSION['logged_on_user'] = "";
    echo "User logged out\n";

?>


<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>