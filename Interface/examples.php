<?php

// abstrait
interface Fooable
{
    function methodA($a);

    function get();

}

interface Barable
{
    function methodB($b, $c);
}


class Foo implements Fooable, Barable{

    function methodA($a)
    {
        echo $a;
    }

    function get()
    {
        echo "hello world";
    }

    function methodB($b, $c)
    {
        var_dump($b.$c);
    }


}

$foo = new Foo;

var_dump($foo->methodB(1,2));



/* ------------------------------------------------- *\
    Interface segregation
\* ------------------------------------------------- */

interface Storable
{
    function setValue($name, $value);
}


class SessionStorage implements Storable
{
    function setValue($name, $price)
    {
        // TODO: Implement setValue() method.
    }

}


class Cart
{

    protected $storage;

    public function __construct(Storable $storage)
    {
        $this->storage = $storage;
    }

}


$cart = new Cart(new SessionStorage());




















