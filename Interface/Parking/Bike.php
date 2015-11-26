<?php

class Bike extends Vehicule implements Parkable
{

    public function speed($value)
    {
        $speed = (float)$value;

        $this->speed = "$speed {$this->unit}";
    }

    public function park()
    {
        return "parked";
    }

    public function outOfPark()
    {
        return "go out side parking";
    }

    public function pay()
    {
        return "payed";
    }
}