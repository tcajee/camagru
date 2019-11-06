<?php

$cstrong = True;

$drop_database = "DROP DATABASE IF EXISTS camagru;";

$create_database = "CREATE DATABASE IF NOT EXISTS camagru;";

$create_users = "CREATE TABLE IF NOT EXISTS users (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		username varchar(255) UNIQUE,
		email VARCHAR(255) UNIQUE,
		password VARCHAR(255),
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

$test_users = "INSERT INTO `users` (`username`, `email`, `password`) VALUES
				('admin', 'tcajee@student.wethinkcode.co.za', '" . password_hash('1234567', PASSWORD_BCRYPT) . "'),
				('admin2', 'sminnaar@student.wethinkcode.co.za', '" . password_hash('123456', PASSWORD_BCRYPT) . "'),
				('dee83', 'cprohaska@yahoo.com','" . password_hash('password', PASSWORD_BCRYPT) . "'),
				('Toy', 'itrantow@kunde.com','" . password_hash('password', PASSWORD_BCRYPT) . "'),
				('Buckridge', 'tsporer@kub.com','" . password_hash('password', PASSWORD_BCRYPT) . "'),
				('Collins', 'mraz.christy@reilly.net','" . password_hash('password', PASSWORD_BCRYPT) . "'),
				('Huels', 'kristina39@hotmail.com','" . password_hash('password', PASSWORD_BCRYPT) . "')
				";

$test_posts = "INSERT INTO posts (`img`, `user`) VALUES
				('../somewhere/img1.png', 1);
				";

$test_comments = "INSERT INTO comments (`post`, `user`, `text`) VALUES
				(1, 1, 'Comment 1');
				";

$test_tokens = "INSERT INTO tokens (`id`, `token`, `user`) VALUES
				(1, '" . sha1(bin2hex(openssl_random_pseudo_bytes(64, $cstring))) . "', 1)
				";
?>
