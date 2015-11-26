<?php namespace Pattern;

interface Subject
{

    function attach(Observer $observer);

    function detach(Observer $observer);

    function notify();

    function get();
}