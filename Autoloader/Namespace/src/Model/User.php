<?php  namespace Model;

class User
{

    private $bar=null;

    public function __construct()
    {
        $this->bar = new \Bar;
    }
}