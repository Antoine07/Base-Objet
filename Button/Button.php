<?php

class Button  {

    /**
     * @var string
     */
    private $state="off";

    /**
     * @var Switchable
     */
    private $device=null;

    public function __construct(Lamp $device){
        $this->device=$device;
    }

    /**
     *
     */
    public function switchDevice() {
        if ($this->state=='off') {
            $this->state = $this->device->turnOn();
        } else {
            $this->state = $this->device->turnOff();
        }
    }
}