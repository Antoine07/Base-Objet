<?php

class Button  {

    /**
     * @var string
     */
    private $state="off";

    /**
     * @var Switchable
     */
    private $device;

    public function __construct($device){
        $this->device=$device;
    }

    public function switchDevice() {
        if ($this->state=='off') {
            $this->state = 'on';
            return $this->device->turnOn();
        } else {
            $this->state = 'off';
            return $this->device->turnOff();
        }
    }
}