<?php

abstract class Vehicule
{

    protected $engine;
    protected $unit = "m/s";
    protected $name;
    protected $speed;

    public function __construct($name, $engine = 'electric')
    {
        $this->setEngine($engine);
        $this->name = $name;
    }

    abstract public function speed($value);

    public function setEngine($engine)
    {
        $this->engine = (string)$engine;
    }



}