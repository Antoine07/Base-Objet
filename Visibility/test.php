<?php

class A
{

    private $foo = 'foo';

    public function getFoo()
    {
        return $this->foo;
    }

}

/* ------------------------------------------------- *\
    Composition B is a compound with an A
\* ------------------------------------------------- */

class B
{
    private $a = null;

    public function __construct()
    {
        $this->a = new A;

       // $this->a->foo; // cannot access private property
    }
}

$b = new B; // fatal error