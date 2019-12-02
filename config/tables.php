<?php

$cstrong = True;

$drop_database = "DROP DATABASE IF EXISTS camagru;";

$create_database = "CREATE DATABASE IF NOT EXISTS camagru;";

$create_users = "CREATE TABLE IF NOT EXISTS users (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		username varchar(255) UNIQUE,
		email VARCHAR(255) UNIQUE,
		pass VARCHAR(255),
		fname VARCHAR(255),
		lname VARCHAR(255),
		photo VARCHAR(255),
		verified TINYINT DEFAULT 0,
		token VARCHAR(255),
	 	PRIMARY KEY (id)
		);";

$create_sessions = "CREATE TABLE IF NOT EXISTS sessions (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		user INT REFERENCES users(id),
		session varchar(255),
	 	PRIMARY KEY (id)
		);";

$create_vusers = "CREATE TABLE IF NOT EXISTS vusers (
		user INT REFERENCES users(id)
		);";

$create_posts = "CREATE TABLE IF NOT EXISTS posts (
		id INT NOT NULL AUTO_INCREMENT,
		img VARCHAR(255),
		likes INT DEFAULT 0,
		time DATETIME DEFAULT NOW(),
		user INT REFERENCES users(id),
		PRIMARY KEY (id)
		);";

$create_comments = "CREATE TABLE IF NOT EXISTS comments (
		post INT REFERENCES posts(id),
		user INT REFERENCES users(id),
		text TEXT NOT NULL,
		time DATETIME DEFAULT NOW()
		);";

$test_users = "INSERT INTO `users` (`username`, `email`, `pass`, `fname`, `lname`, `photo`, `verified`, `token`) VALUES
				('admin', 'tcajee@student.wethinkcode.co.za', '$2y$10\$nI6rNSnT1uNr540TCTgQmOWJoEkE7KZYDb3y2Nr2NK0kbRFG/CWQq', 'Tameem', 'Cajee', 'img/profile/Tameem.jpeg', '1'," . "'" . bin2hex(openssl_random_pseudo_bytes(64, $cstrong)) . "'" . "),
				('admin2', 'sminnaar@student.wethinkcode.co.za', '$2y$10\$nI6rNSnT1uNr540TCTgQmOWJoEkE7KZYDb3y2Nr2NK0kbRFG/CWQq', 'LeRoux', 'Minnaar', 'img/profile/SL.jpeg', '1'," . "'" . bin2hex(openssl_random_pseudo_bytes(64, $cstrong)) . "'" . "),
				('username', 'user@user.com','$2y$10\$nI6rNSnT1uNr540TCTgQmOWJoEkE7KZYDb3y2Nr2NK0kbRFG/CWQq', 'Username', 'UserSurname', 'img/profile/def4.jpg', '1', " . "'" . bin2hex(openssl_random_pseudo_bytes(64, $cstrong)) . "'" . ")
				";

$test_posts = "INSERT INTO posts (`img`, `user`) VALUES
				('img/test.jpg', 1),
				('img/test.jpg', 2),
				('img/test.jpg', 2),
				('img/test.jpg', 3),
				('img/test.jpg', 3),
				('img/test.jpg', 3)
				";

$test_comments = "INSERT INTO comments (`post`, `user`, `text`) VALUES
				(1, 1, 'Tedfdfsgsting');
				";

$statements = ['create_users', 'create_sessions', 'create_posts', 'create_comments', 'test_users', 'test_posts', 'test_comments'];
