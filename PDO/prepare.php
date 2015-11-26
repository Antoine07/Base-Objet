<?php

require_once './Connect.php';

$database = [
    'dsn'      => 'mysql:host=localhost;dbname=ecole_multimedia',
    'password' => 'root',
    'username' => 'antoine'
];

$connect = new Connect($database);

$pdo = $connect->getDB();

/* ------------------------------------------------- *\
    prepare => same executable
\* ------------------------------------------------- */

$prepare = $pdo->prepare("
                        INSERT INTO
                       `posts` (`title`)
                        VALUES ('bazUUUUU')
                      ");


$prepare->execute();
$prepare->execute();
$prepare->execute();

$stmt = $pdo->query('SELECT * FROM posts');

var_dump($stmt->fetchAll()); die;


/* ------------------------------------------------- *\
    Security place holder
\* ------------------------------------------------- */


$prepare = $pdo->prepare("
                       SELECT *
                       FROM `posts`
                       WHERE `id`>?
                       AND `status`=?
                      "
);

$id = 1;
$status = 'published';
$prepare->bindValue(1, $id, PDO::PARAM_INT);
$prepare->bindValue(2, $status, PDO::PARAM_STR);
$prepare->execute();

$posts = $prepare->fetchAll(PDO::FETCH_ASSOC);

var_dump($posts);

$id = 2;
$status = 'published';
$prepare->bindValue(1, $id, PDO::PARAM_INT);
$prepare->bindValue(2, $status, PDO::PARAM_INT);
$prepare->execute();

$posts = $prepare->fetchAll(PDO::FETCH_ASSOC);

var_dump($posts);