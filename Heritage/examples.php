<?php

class Foo{

    private $foo='foo';

    public function getFoo()
    {
        return $this->foo;
    }

}

class Bar extends Foo
{

}

$bar = new Bar;

echo $bar->getFoo();


/* ------------------------------------------------- *\
    Product
\* ------------------------------------------------- */

class Product
{
    private $name;
    private $price; // HT
    protected $tva=0.2;

    public function getTva()
    {
        return $this->tva;
    }

    public function setPrice($price)
    {
        $this->price = (float) $price;
    }

    public function getPriceTtc()
    {
        return $this->price*($this->tva + 1) ;
    }

}

class Stylo extends Product
{
    private $color = 'red';
}

$stylo = new Stylo;

$stylo->setPrice(10);

var_dump($stylo->getPriceTtc());

// 1.8  tva
class StyloEn extends Product
{
    private $color = 'green';

    public function setTva($tva)
    {
        $this->tva = $tva;
    }
}


$styloEn = new StyloEn;

$styloEn->setPrice(10);

$styloEn->setTva(1.8);

var_dump($styloEn);

var_dump($styloEn->getPriceTtc());