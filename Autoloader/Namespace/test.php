<?php

spl_autoload_register('autoload');

function autoload($className)
{

    $className = str_replace('\\', '/', $className);

    $fileName = __DIR__ . '/src/' . $className . ".php";

    if (file_exists($fileName)) {
        require_once $fileName;

        return;
    }

    die(sprintf('this filename doesn\'t exists %s', $fileName));

}

use Model\Post;
use Middleware\Request\Request;

$request = new Request;

$postModel = new Post;
var_dump($postModel);

var_dump($request);