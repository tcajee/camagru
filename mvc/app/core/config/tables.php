<?php

$drop_database = "DROP DATABASE IF EXISTS camagru;";

$create_database = "CREATE DATABASE IF NOT EXISTS camagru;";

$create_users = "CREATE TABLE IF NOT EXISTS users (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(255) UNIQUE,
		email varchar(255) UNIQUE,
		hash varchar(255),
	 	PRIMARY KEY (id)
		);";

$create_vusers = "CREATE TABLE IF NOT EXISTS vusers (
		user int REFERENCES users(id)
		);";

$create_posts = "CREATE TABLE IF NOT EXISTS posts (
		id int NOT NULL AUTO_INCREMENT,
		img varchar(255),
		likes int DEFAULT 0,
		time DATETIME DEFAULT NOW(),
		user int REFERENCES users(id),
		PRIMARY KEY (id)
		);";

$create_comments = "CREATE TABLE IF NOT EXISTS comments (
		post int REFERENCES posts(id),
		user int REFERENCES users(id),
		text text NOT NULL,
		time DATETIME DEFAULT NOW()
		);";

$test_users = "INSERT INTO `users` (`name`, `email`, `hash`) VALUES
				('admin', 'tcajee@student.wethinkcode.co.za', '" . hash('sha256', '1234567') . "'),
				('admin2', 'sminnaar@student.wethinkcode.co.za', '" . hash('sha256', '123456') . "'),
				('dee83', 'cprohaska@yahoo.com','" . hash('sha256', '234567') . "'),
				('Toy', 'itrantow@kunde.com','" . hash('sha256', '34567') . "'),
 				('Buckridge', 'tsporer@kub.com','" . hash('sha256', '4567')  . "'),
 				('Collins', 'mraz.christy@reilly.net','" . hash('sha256', '567') . "'),
				('Huels', 'kristina39@hotmail.com','" . hash('sha256', '67') . "')
				";

$test_posts = "INSERT INTO posts (`img`, `user`) VALUES
					('../somewhere/img1.png', 1);
					";

$test_comments = "INSERT INTO comments (`post`, `user`, `text`) VALUES
					(1, 1, 'Comment 1');
					";

?>