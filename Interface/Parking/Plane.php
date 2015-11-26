<?php 
class Plane extends Vehicule{

    public function speed($value)
    {
        $speed = (float)$value;
        $this->speed = "$speed {$this->unit}";
    }


}