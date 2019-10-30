<?php

	date_default_timezone_set('UTC');
	include_once("./inc/config.php");
	
	//
	// CREATING THE DATABASE----------------------------------------------------
	//

	$sql = "CREATE DATABASE Camagru";
	if (mysqli_query($conn, $sql)){
		echo "Database created successfully\n";
	}else{
		echo "Error creating Database " . mysqli_error($conn) . "\n";
	}

	//
	// CREATING THE TABLES------------------------------------------------------
	//

	$conn = mysqli_connect(SERVERNAME, DB_USERNAME, DB_PASS, "Camagru");

	$user_table = "CREATE TABLE users (
		user.id int NOT NULL AUTO_INCREMENT,
		user.name varchar(255) NOT NULL, 
		user.email varchar(255) NOT NULL, 
		user.hash varchar(255) NOT NULL,
	 	PRIMARY KEY (user.id)
		);";
	if (mysqli_query($conn, $user_table)){
		echo "User Table created successfully\n";
	} else {
		echo "Error creating User Table " . mysqli_error($conn) . "\n";
	}
	
	$vuser_table = "CREATE TABLE vusers (
		user.verify tinyint NOT NULL,
	 	PRIMARY KEY (user.verify)
		);";
	if (mysqli_query($conn, $vusers_table)){
		echo "User Table created successfully\n";
	} else {
		echo "Error creating User Table " . mysqli_error($conn) . "\n";
	}
	
	$post_table = "CREATE TABLE posts (
		post.id int NOT NULL,
		post.img blob NOT NULL,
		post.likes int,
		post.time INT UNSIGNED NOT NULL,
		PRIMARY KEY (post.id)
		);";
	if (mysqli_query($conn, $post_table)){
		echo "Post Table created successfully\n";
	} else {
		echo "Error creating post Table " . mysqli_error($conn) . "\n";
	}

	$comments_table = "CREATE TABLE comments (
		post.id int NOT NULL,
		user.id int NOT NULL,
		comment.text text NOT NULL,
		comment.time INT UNSIGNED NOT NULL,
		FOREIGN KEY (post.id),
		FOREIGN KEY (user.id)
		);";
	if (mysqli_query($conn, $comments_table)){
		echo "Comments Table created successfully\n";
	}else{
		echo "Error creating Comment Table " . mysqli_error($conn) . "\n";
	}

	//
	// CREATING DEFAULT TABLE DATA----------------------------------------------
	//

	$test_users = "INSERT INTO `users` (`user.id`, `user.name`, `user.email`, `user.hash`) VALUES
					('1', 'admin', 'tcajee@student.wethinkcode.co.za.', hash('sha256', '1234567')),
					;";
	if (mysqli_query($conn, $test_users)){
		echo "Default_user created successfully\n";
	}else{
		echo "Error creating Default user " . mysqli_error($conn) . "\n";
	}

	$test_posts = "INSERT INTO `posts` (`post.id`, `post.img`, `post.likes`, `post.time`) VALUES 
					('1', '../somewhere/img1.png', '42', UNIX_TIMESTAMP()),
					('2', '../somewhere/img1.png', '42', UNIX_TIMESTAMP()),
					;";
	if (mysqli_query($conn, $test_posts)){
		echo "Test posts created successfully\n";
	}else{
		echo "Error creating test posts" . mysqli_error($conn) . "\n";
	}

	$test_comments = "INSERT INTO `comments` (`post.id`, `user.id`, `comment.text`, `comment.time`) VALUES 
					('1', '1', 'Lorem ipsum sit amet, adipisicing . Iste expedita facere enim alias asperiores commodi recusandae , in at ab  ducimus quas  velit.', UNIX_TIMESTAMP()), 
					('2', '1', 'Lorem ipsum dolor amet, consectetur elit. mollitia laudantium dignissimos alias deserunt commodi , in esse at ab  quas aperiam .', UNIX_TIMESTAMP()), 
					;";
	if (mysqli_query($conn, $test_comments)){
		echo "Test comments created successfully\n";
	}else{
		echo "Error creating test comments" . mysqli_error($conn) . "\n";
	}
	?>




