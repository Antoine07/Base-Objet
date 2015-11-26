<?php
//require __DIR__ . '/src/Bar.php';
//require __DIR__ . '/src/Foo.php';
//require __DIR__ . '/src/Baz.php';

spl_autoload_register('autoload');

function autoload($className)
{
    $fileName = __DIR__ . '/src/' . $className . ".php";

    if (file_exists($fileName)) {
        require_once $fileName;

        return;
    }

    die(sprintf('this filename doesn\'t exists %s', $fileName));

}

$foo = new Foo;
$baz = new Baz;

var_dump($foo);
//var_dump($baz);