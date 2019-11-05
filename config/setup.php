<?php
    include("database.php");

    function executeSQL($SQLstatement, $error, $pdo){
        try {
            $db = $pdo->prepare($SQLstatement);
            $db->execute();
        } catch(PDOException $e) {
            echo $error . " has failed: " . $e->getMessage() . "<br />";
        }
    }

    executeSQL($create_users, "Creation of users table", $pdo);
    executeSQL($create_posts, "Creation of posts table", $pdo);
    executeSQL($create_comments, "Creation of comments table", $pdo);
    executeSQL($test_users, "Insertion of test users", $pdo);
    executeSQL($test_posts, "Insertion of test posts", $pdo);
    executeSQL($test_comments, "Insertion of test comments", $pdo);
?>
