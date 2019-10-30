<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "1234567";
	$dbname = "camagru";

	require_once("table5.php");

	try{
		$conn = new PDO("mysql:hostname=$hostname", $username, $password);
        
        $db = $conn->prepare($drop_database);
		$db->execute();
		$db = $conn->prepare($create_database);
		$db->execute();
        
        $conn = new PDO("mysql:hostname=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection to database $dbname failed: " . $e->getMessage() . "<br />";
    }
?>
