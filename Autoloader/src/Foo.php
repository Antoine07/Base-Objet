<?php

//require_once __DIR__.'/Bar.php';

class Foo {

    private $bar;

    public function __construct()
    {
        $this->bar = new Bar;
    }
}