<?php

require_once './Connect.php';

$database = [
    'dsn'      => 'mysql:host=localhost;dbname=ecole_multimedia',
    'password' => 'root',
    'username' => 'antoine'
];

$connect = new Connect($database);

$pdo= $connect->getDB();

/* ------------------------------------------------- *\
    That's all
\* ------------------------------------------------- */

$sql="SELECT * FROM posts";

$stmt = $pdo->query($sql);

$posts = $stmt->fetchAll();

foreach($posts as $post)
{
    echo "<h1>{$post->title}</h1>";
    echo "<p>Statut de l'article: {$post->status}</p>";
}