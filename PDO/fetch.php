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

while($post= $stmt->fetch())
{
    echo "<h1>{$post->title}</h1>";
    echo "<p>Statut de l'article: {$post->status}</p>";
}