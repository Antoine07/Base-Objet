<?php

require_once __DIR__ . '/vendor/autoload.php';

/* ------------------------------------------------- *\
    Helpers
\* ------------------------------------------------- */

function view($path, array $data)
{

    $fileName = __DIR__ . '/src/views/' . implode('/', explode('.', $path)) . ".php";

    if (!file_exists($fileName)) throw new RuntimeException(sprintf('this view doesn\t exists, %s', $fileName));

    header('Content-type: text/html; charset=UTF-8');
    extract($data);
    include $fileName;
}

function url($path = '')
{
    return "http://192.168.33.22/" . $path;
}


/* ------------------------------------------------- *\
    Bootstrap App
\* ------------------------------------------------- */

use Models\Connect;

$database = [
    'dsn'      => 'mysql:host=localhost;dbname=db_trombi',
    'password' => 'root',
    'username' => 'antoine'
];

Connect::setDB($database);

use Controllers\UserController;

$userController = new UserController;

/* ------------------------------------------------- *\
    Request
\* ------------------------------------------------- */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = strtolower($_SERVER["REQUEST_METHOD"]);

/* ------------------------------------------------- *\
    Router
\* ------------------------------------------------- */

if ($method == 'get') {
    switch ($uri) {

        case "/":

            $userController->index();
            break;

        case "/":
            $userController->index();
            break;
    }
}

if ($method == 'post') {

    switch ($uri) {
        case 'store':
            $userController->store();
            break;
    }
}
