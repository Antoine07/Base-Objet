<?php

class Boat extends Vehicule
{

    public function speed($value)
    {
        $speed = (float)$value;
        $this->speed = "$speed {$this->unit}";
    }



}