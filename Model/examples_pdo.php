<?php

$database=[
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'antoine',
    'dbname'=> 'ecole_multimedia'
];

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

// API PDO pour se connecter à notre base de données
$pdo= new PDO("mysql:host={$database['host']};dbname={$database['dbname']}",
    $database['username'],
    $database['password'],
    $options
);

$sql="SELECT * FROM posts";

$posts = $pdo->query($sql);

foreach($posts as $post)
{
    echo "<h1>{$post->title}</h1>";
    echo "<p>Statut de l'article: {$post->status}</p>";
}

$sql = "SELECT * FROM posts WHERE id=1";

$post = $pdo->query($sql);

var_dump($post); // renvoyer la chaine de caractère SQL

foreach($post as $p)
{
    echo "<h1>{$p->title}, id = {$p->id}</h1>";
    echo "<p>Statut de l'article: {$p->status}</p>";
}

var_dump((int) "<script> alert('foo')</script>"); // affiche int 0
var_dump((int) '123415'); // int 123415

$id= 1;

$sql = sprintf("SELECT * FROM posts WHERE id=%d", (int) $id );

var_dump($sql);

$title = "' DELETE ...";

$title = $pdo->quote($title);

var_dump($title);

$title= 'php';
$sql = sprintf('SELECT * FROM posts WHERE title=%s',
    $pdo->quote($title)
);

$post = $pdo->query($sql); // PDOStatement

foreach($post as $p)
{
    echo "<h1>{$p->title}</h1>";
}

// compter le nombre de posts


$sql = "SELECT count(*) as number_post FROM posts";

$post = $pdo->query($sql); // PDOStatement

foreach($post as $p)
{
    echo "<h1>Number post: {$p->number_post}</h1>";
}

$id=100;
$sql = sprintf("SELECT * FROM posts WHERE id=%d", (int) $id );

$posts = $pdo->query($sql); // PDOStatement

foreach($posts as $post)
{
    echo "<h1>{$post->title}</h1>";
}