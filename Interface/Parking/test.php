<?php

require_once __DIR__ . '/Parking.php';
require_once __DIR__ . '/Parkable.php';
require_once __DIR__ . '/Vehicule.php';
require_once __DIR__ . '/Bike.php';
require_once __DIR__ . '/Car.php';
require_once __DIR__ . '/Plane.php';
require_once __DIR__ . '/Ferry.php';
require_once __DIR__ . '/ConcretMixer.php';

$parking = new Parking;

echo count($parking); // method count de la classe sera appelée

$brompton = new Bike('brompton', 'no engine');
$brompton->speed(10);
var_dump($brompton);

$dahon = new Bike('dahon', 'no engine');
$dahon->speed(10);
var_dump($dahon);

$zoe = new Car('zoe', 'hydrogen');
$zoe->speed(100);
var_dump($zoe);

$a320 = new Plane('A380', 'hydrogen');
$a320->speed(900);
var_dump($a320);

$concretMixer = new ConcretMixer();
var_dump($concretMixer);

//$parking->add($a320);  // Impossible car non Parkable

$parking->add($brompton);
var_dump(count($parking));

$parking->add($dahon);
var_dump(count($parking));

$parking->add($zoe);
var_dump(count($parking));

$parking->add($concretMixer);
var_dump(count($parking));

$parking->remove($zoe);
var_dump(count($parking));

// Ferry
$ferry = new Ferry($parking);

foreach ($ferry->getParking()->getStorage() as $elem)
    var_dump($elem);