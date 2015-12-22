<?php

require_once 'Calculator.php';

$calculator = new Calculator;

//var_dump(range(1,100));

$calculator->run('+', range(1,100));

echo $calculator;

var_dump('--------- run +1');

$calculator->run('+', [1]);

echo $calculator;

var_dump('--------- run *2');

$calculator->run('*', [2]);

echo $calculator;

var_dump('--------- reset');

$calculator->reset();

echo $calculator;

var_dump('--------- new add');

$calculator->run('+', [1, 100]);

echo $calculator;