<?php

/* ------------------------------------------------- *\
    Ex Lamp, Video Button
\* ------------------------------------------------- */

require_once './Lamp.php';
require_once './Button.php';
require_once './Video.php';

$lamp= new Button(new Lamp);

echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off
echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off

// video

var_dump("------ video -----------");

$video = new Button(new Video);

var_dump($video);

var_dump($video->switchDevice());
var_dump($video->switchDevice());
var_dump($video->switchDevice());
var_dump($video->switchDevice());
var_dump($video->switchDevice());
var_dump($video->switchDevice());