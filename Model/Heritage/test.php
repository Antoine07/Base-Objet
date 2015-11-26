<?php
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/Connect.php';
require_once __DIR__ . '/Post.php';
require_once __DIR__ . '/User.php';

$database = [
    'dsn'      => 'mysql:host=localhost;dbname=ecole_multimedia',
    'password' => 'root',
    'username' => 'antoine'
];

$connect = new Connect($database);

/* ------------------------------------------------- *\
    Name of Model $postModel or $userModel ...
\* ------------------------------------------------- */
$postModel = new Post($connect->getDB());

var_dump($postModel->count());

$posts = $postModel->select(['title', 'status', 'content'])
    ->where('id', '>', 1)
    ->where('status', '=', 'published')
    ->get();

foreach ($posts as $post) {
    echo "<h1>{$post->title}</h1>";
}

/* ------------------------------------------------- *\
    Count method
\* ------------------------------------------------- */

var_dump($postModel->count());
var_dump($postModel->where('id', '>', 1)->count());

/* ------------------------------------------------- *\
    Method all
\* ------------------------------------------------- */

var_dump($postModel->all());

$posts = $postModel->all();

foreach ($posts as $post) {
    echo "<h1>{$post->title}...</h1>";
}

/* ------------------------------------------------- *\
    method find
\* ------------------------------------------------- */

var_dump($postModel->find(1));

/* ------------------------------------------------- *\
    Create
\* ------------------------------------------------- */

$postModel->create(['title' => 'foo', 'status' => 'published']);

/* ------------------------------------------------- *\
    User model
\* ------------------------------------------------- */

$userModel = new User($connect->getDB());

var_dump($userModel->all());

/* ------------------------------------------------- *\
    Destroy
\* ------------------------------------------------- */

//var_dump($postModel->destroy(17));

/* ------------------------------------------------- *\
    Update
\* ------------------------------------------------- */

$data = ['title' => 'foo bar baz', 'status' => 'published'];
var_dump($postModel->update(50, $data));
