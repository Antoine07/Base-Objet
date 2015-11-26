<?php

require_once 'Letter.php';
require_once 'View.php';

$number = 96*8;

if (!empty($_GET['number'])) {
    $number = (int)$_GET['number'];
}

$proportion = ceil($number / 16);

$letter = new Letter($number);

$view = new View;

$letters = $letter->getLetters();

$time = $letter->getTime();

$view->render('./views/index', compact('letters', 'time', 'proportion'));
