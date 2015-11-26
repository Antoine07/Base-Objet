<?php


//throw new Exception("i'm exception");
//
//
//echo "le code est-il exécuté ?";


function foo()
{
    $a = new A;

    $a->bar();
}


class A
{

    public function bar()
    {
        $this->get();
    }

    public function get()
    {
        throw new Exception(sprintf('this is exception'));
    }

}


foo();