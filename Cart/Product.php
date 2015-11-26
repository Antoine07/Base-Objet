<?php

class Product
{

    private $name;
    private $price;
    protected $tva = .2;


    public function __construct($name = '', $price = 0)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     *
     */
    public function getTTC()
    {
        return (float)$this->price * $this->tva;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = (float)$price;
    }

    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);

        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    public function __get($name)
    {
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

}