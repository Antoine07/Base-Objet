<?php

class Ferry extends Vehicule
{
    private $parking;
    protected $unit = 'miles';

    public function __construct(Parking $parking)
    {
        $this->parking = $parking;
    }

    public function getParking()
    {
        return $this->parking;
    }

    public function speed($value)
    {
        $speed = (float)$value;
        $this->speed = "$speed {$this->unit}";
    }

}