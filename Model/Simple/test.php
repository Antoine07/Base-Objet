<?php

require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/Connect.php';

$database = [
    'host'     => 'localhost',
    'dbname'   => 'ecole_multimedia',
    'password' => 'root',
    'username' => 'antoine'
];

$connect = new Connect($database);

$model = new Model($connect->getDB());
$model->table = 'posts';

$posts = $model->select(['title', 'status', 'content'])->where('id', '>', 1)->where('status', '=', 'published')->get();

foreach ($posts as $post) {
    echo "<h1>{$post->title}</h1>";
}

var_dump($model->count());
var_dump($model->where('id', '>', 1)->count());