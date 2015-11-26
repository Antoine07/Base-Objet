<?php

require_once 'Calculator.php';

$calculator = new Calculator();

var_dump('/* ------ Add -------- */');

$calculator->run('+', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);
echo $calculator;

var_dump('/* ------ Add -------- */');

$calculator->reset(); // variable de classe $result
$calculator->run('+', range(1, 100));

echo $calculator;

var_dump('/* ------ Mul -------- */');

$calculator->reset(); // variable de classe $result
$calculator->run('*', range(1, 5));

echo $calculator;

var_dump('/* ------ test -------- */');
$calculator->reset();
$calculator->run('+', []);
echo $calculator;

var_dump('/* ------ test -------- */');
$calculator->reset();
$calculator->run('*', []);

echo $calculator;


var_dump('/* ------ test foo -------- */');
$calculator->reset();
$calculator->run('*', 'foo');

echo $calculator;