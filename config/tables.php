<?php

$cstrong = True;

$drop_database = "DROP DATABASE IF EXISTS camagru;";

$create_database = "CREATE DATABASE IF NOT EXISTS camagru;";

$create_users = "CREATE TABLE IF NOT EXISTS users (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		username varchar(255) UNIQUE,
		email VARCHAR(255) UNIQUE,
		password VARCHAR(255),
		fname VARCHAR(255),
		lname VARCHAR(255),
		acl TEXT,
	 	PRIMARY KEY (id)
		);";

$create_vusers = "CREATE TABLE IF NOT EXISTS vusers (
		user INT REFERENCES users(id)
		);";

$create_tokens = "CREATE TABLE IF NOT EXISTS tokens (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		token VARCHAR(255) NOT NULL UNIQUE,
		user INT REFERENCES users(id),
	 	PRIMARY KEY (id)
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

$test_users = "INSERT INTO `users` (`username`, `email`, `password`, `fname`, `lname`, `acl`) VALUES
				('admin', 'tcajee@student.wethinkcode.co.za', '$2y$10\$nI6rNSnT1uNr540TCTgQmOWJoEkE7KZYDb3y2Nr2NK0kbRFG/CWQq', 'Tameem', 'Cajee', 'text'),
				('dee83', 'cprohaska@yahoo.com','$2y$10$1GYzTYf6MGHJlGbsqOcXsOToZhMOjEm0znucR/DrM57q3ZUWNP7ri', 'Dee', 'Prohaska', 'text'),
				('Toy', 'itrantow@kunde.com','$2y$10$1GYzTYf6MGHJlGbsqOcXsOToZhMOjEm0znucR/DrM57q3ZUWNP7ri', 'Toy', 'Rantow', 'text'),
				('Buckridge', 'tsporer@kub.com','$2y$10$1GYzTYf6MGHJlGbsqOcXsOToZhMOjEm0znucR/DrM57q3ZUWNP7ri', 'Buck', 'Porer', 'text'),
				('Collins', 'mraz.christy@reilly.net','$2y$10$1GYzTYf6MGHJlGbsqOcXsOToZhMOjEm0znucR/DrM57q3ZUWNP7ri', 'Collin', 'Mraz', 'text'),
				('Huels', 'kristina39@hotmail.com','$2y$10$1GYzTYf6MGHJlGbsqOcXsOToZhMOjEm0znucR/DrM57q3ZUWNP7ri', 'Huels', 'Kristina', 'text')
				";

$test_posts = "INSERT INTO posts (`img`, `user`) VALUES
				('../somewhere/img1.png', 1);
				";

$test_comments = "INSERT INTO comments (`post`, `user`, `text`) VALUES
				(1, 1, 'BITCH FUCKING PLZZZZZZZZZ');
				";

$test_tokens = "INSERT INTO tokens (`id`, `token`, `user`) VALUES
				(1, '" . sha1(bin2hex(openssl_random_pseudo_bytes(64, $cstring))) . "', 1)
				";

$statements = ['create_users', 'create_tokens', 'create_posts', 'create_comments', 'test_users', 'test_posts', 'test_comments', 'test_tokens']; 
