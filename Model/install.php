<?php

$database = [
    'host'     => 'localhost',
    'username' => 'root',
    'password' => 'antoine',
    'dbname'   => 'ecole_multimedia'
];

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

// API PDO pour se connecter à notre base de données
$pdo = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}",
    $database['username'],
    $database['password'],
    $options
);

$pdo->exec("
	CREATE TABLE IF NOT EXISTS  `posts`(
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`title` VARCHAR(100),
		`content`TEXT,
		`status` ENUM('published', 'unpublished') NOT NULL DEFAULT 'unpublished',
		PRIMARY KEY(`id`)
	)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
");

$pdo->exec("
	CREATE TABLE IF NOT EXISTS `users`(
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`username` VARCHAR(100),
		`password` VARCHAR(255),
		`badge` SMALLINT UNSIGNED,
		PRIMARY KEY(`id`)
	)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
");

$sql = sprintf("INSERT INTO `users` (`username`, `password`,`badge`) VALUES ('Tony', '%s', '8918')", password_hash("Tony", PASSWORD_DEFAULT));

$pdo->exec($sql);