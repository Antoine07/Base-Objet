<?php

require_once './Connect.php';

$database = [
    'dsn'      => 'mysql:host=localhost;dbname=ecole_multimedia',
    'password' => 'root',
    'username' => 'antoine'
];

$connect = new Connect($database);

$pdo = $connect->getDB();

$pdo->exec("
	CREATE TABLE IF NOT EXISTS `users`(
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`username` VARCHAR(100),
		`password` VARCHAR(100),
		PRIMARY KEY(`id`)
	)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
");

/* ------------------------------------------------- *\
    Injection SQL, Example 1
\* ------------------------------------------------- */


$status = "'published' ; UPDATE `posts` SET `title` = 'hello injection22' ";

$sql = "SELECT * FROM posts WHERE status=$status";

sprintf("SELECT * FROM posts WHERE status='%s'", $status);


/* ------------------------------------------------- *\
   protection prepare request
\* ------------------------------------------------- */


$prepare = $pdo->prepare('SELECT * FROM posts WHERE status=?');

$status = "unpublished; UPDATE posts SET title='hack';";

$prepare->bindValue(1, $status, PDO::PARAM_STR);

var_dump($prepare->execute());
var_dump($prepare->fetchAll());

$sql="SELECT * FROM posts";

$stmt = $pdo->query($sql);

$posts = $stmt->fetchAll();

$posts = $pdo->query($sql);

foreach ($posts as $post) {
    echo "< h1>{$post->title}</h1>";
    echo "<p> Status {$post->status}</p>";
}

$posts = null;  // clean request

/* ------------------------------------------------- *\
    Injection Example 2
\* ------------------------------------------------- */

$username = "Tony'-- ";
$password = "blabla";

$sql = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'", $username, $password);

var_dump($sql);

$stmt = $pdo->query($sql);

var_dump($stmt->fetch());

$stmt = null;

/* ------------------------------------------------- *\
    ' or 1 --
\* ------------------------------------------------- */

$username = "Tony";
$password = " ' or 1 -- ";

$sql = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'", $username, $password);

var_dump($sql);

$stmt = $pdo->query($sql);

var_dump($stmt->fetch());

$stmt = null;

/* ------------------------------------------------- *\
    Injection variable numeric
\* ------------------------------------------------- */

$username = "Tony";
$password = '';
$badge = " 0 or 1 -- ";

$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password' AND badge=$badge ;";

var_dump($sql); die;

$stmt = $pdo->query($sql);

var_dump($stmt->fetch());

$stmt = null;