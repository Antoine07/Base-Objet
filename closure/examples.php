<?php

$data = ['naoudi', 'antoine', 'jules'];
$o = array_map(function ($v) {
    return ucwords($v);
}, $data);
var_dump($o);


$data2 = ['john', 'david', 'alan'];

$r = array_walk($data2, function (&$v, $k) {
    echo $k;
    $v = ucfirst($v);

});

var_dump($r); // return true false

var_dump($data2);

// rappel sur le passage par référence

$bar = 10;

function foo(&$v)
{
    return ++$v;
}


var_dump(foo($bar)); // 11
var_dump($bar); // 10


$message = "hello world";
$bar = function () use ($message) {
    echo $message;
};

echo $bar();

$tva = .2;

$ttc = function ($price) use ($tva) {
    return $price * (1 + $tva);
};

echo $ttc(1234);

// increment

$compt = 0;

$incr = function () use (&$compt) {
    $compt++;
};

$incr();
$incr();
$incr();
$incr();

var_dump($compt);


$sum = function ($v) {
    return function () use (&$v) {
        return ++$v;
    };
};

$s = $sum(10);

var_dump($s());
var_dump($s());

$func = function () {
    return ++$this->count;
};

class Bar
{
    public $count = 0;
}


$bind = $func->bindTo(new Bar);

echo "<h1> bindTo: {$bind()}</h1>";
echo "<h1> bindTo: {$bind()}</h1>";
echo "<h1> bindTo: {$bind()}</h1>";


class Foo
{
    private $count = 100;
}

$foo = new Foo;
$bind = $func->bindTo($foo, $foo);

echo "<h1> bindTo: {$bind()}</h1>";
echo "<h1> bindTo: {$bind()}</h1>";
echo "<h1> bindTo: {$bind()}</h1>";


$baz = function (Closure $fun) {
    $fun();
};

$baz(function () {
    echo "hello world";
});