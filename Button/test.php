<?php

/* ------------------------------------------------- *\
    Ex Lamp Button
\* ------------------------------------------------- */

require_once './Lamp.php';
require_once './Button.php';

$lamp = new Button(new Lamp);

echo $lamp->switchDevice(); // turn on
var_dump($lamp);
echo $lamp->switchDevice(); // turn off
var_dump($lamp);
echo $lamp->switchDevice(); // turn on
var_dump($lamp);
echo $lamp->switchDevice(); // turn off
var_dump($lamp);