<?php

	define("SERVERNAME", "localhost:3306");
	define("DB_USERNAME", "root");
	define("DB_PASS", "1234567");

  $conn = new mysqli(SERVERNAME, DB_USERNAME, DB_PASS);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

