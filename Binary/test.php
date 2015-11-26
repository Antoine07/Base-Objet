<?php

require_once __DIR__ . '/Binary.php';

$binary = new Binary;
$binary->decbin(2);
var_dump((string)$binary);

$binary->reset();

$binary->decbin(8);
var_dump((string)$binary);

$binary->reset();

$binary->decbin(16);
var_dump((string)$binary);

$binary->reset();

$binary->decbin(12343156);
var_dump((string)$binary);

var_dump(decbin(12343156));