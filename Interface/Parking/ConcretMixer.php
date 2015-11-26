<?php

class ConcretMixer implements Parkable
{

    private $name = 'concret Mixer';
    private $speed = '5 m/s';

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