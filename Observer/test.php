<?php
spl_autoload_register(function ($class) {
    require_once str_replace('\\', '/', $class) . '.php';
});

$file = __DIR__ . '/storage/database.sqlite';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

$pdo = new PDO("sqlite:$file", null, null, $options);

$pdo->exec("
    CREATE TABLE IF NOT EXISTS
      messages (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      content TEXT,
      published_at DATETIME )
");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS
      histories (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      published_at DATETIME )
");



// observers
$db = new Observers\DB($pdo, 'histories');
$splFile = new \SplFileObject(__DIR__ . '/storage/data.txt', 'a+');
$file = new Observers\File($splFile);

// subjects
$message = new Message($pdo);
$message->attach($db);
$message->attach($file);

$message->create('Hello world');

var_dump($message->all());

$stmt = $pdo->query('select * from histories');

var_dump($stmt->fetchAll());
var_dump(file_get_contents(__DIR__ . '/storage/data.txt'));