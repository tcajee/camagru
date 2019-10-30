<?php
    include("database.php");

    function executeSQL($SQLstatement, $error, $conn){
        try{
            $db = $conn->prepare($SQLstatement);
            $db->execute();
        }catch(PDOException $e){
            echo $error . " has failed: " . $e->getMessage() . "<br />";
        }
    }

	/* executeSQL($drop_database, "Dropping database", $conn); */
    /* executeSQL($create_database, "Creation of database", $conn); */
    executeSQL($create_users, "Creation of users table", $conn);
    executeSQL($create_posts, "Creation of posts table", $conn);
    executeSQL($create_comments, "Creation of comments table", $conn);
    executeSQL($test_users, "Insertion of test users", $conn);
    executeSQL($test_posts, "Insertion of test posts", $conn);
    executeSQL($test_comments, "Insertion of test comments", $conn);
?>
