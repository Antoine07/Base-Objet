<?php

/* ------------------------------------------------- *\
    Examples lesson
\* ------------------------------------------------- */

class Foo{

    public $bar='bar';

    public function getBar()
    {
        return $this->bar;
    }

    public function test()
    {
        var_dump($this);
    }
}

$foo = new Foo;// concret dans la mémoire de PHP

$foo->bar="hello world";

$foo2 = new Foo;// concret dans la mémoire de PHP

var_dump($foo);
var_dump($foo2);

$foo->test();

/* ------------------------------------------------- *\
    __construct __toString __set
\* ------------------------------------------------- */

class Bar{

    private $bar='';

    // construct

    public function __construct($bar='')
    {
        $this->bar = $bar;
    }

}


$bar = new Bar();  // new Bar

var_dump($bar);

$bar2 = new Bar('bar');

var_dump($bar2);


//
//
//class Bike
//{
//
//    public $engine = 'electric'; // visibility public
//    private $color = 'red';
//
//    public function getColor()
//    {
//        return $this->color;
//    }
//
//    public function setColor($color)
//    {
//        $this->color = $color;
//    }
//
//}
//
///* ------------------------------------------------- *\
//    Objects
//\* ------------------------------------------------- */
//
//$bike = new Bike;
//$bike2 = $bike; // same object
//$bike3 = new Bike;
//
//var_dump($bike->engine); // public
////var_dump($bike->color); // fatal error private variable
//
//var_dump($bike->getColor()); // access to private variable
//
//// test memory PHP => zval is_ref and refcount
//xdebug_debug_zval('bike');
//xdebug_debug_zval('bike2');
//xdebug_debug_zval('bike3');
//
///* ------------------------------------------------- *\
//    Ex Calculator
//    algorithm **
//    lessons refactoring private members exception magic method __toString
//\* ------------------------------------------------- */
//
//require_once __DIR__ . '/Calculator/Calculator.php';
//
//$calculator = new Calculator();
//
//$calculator->run('+', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
//
//echo $calculator;
//
//$calculator->reset();
//
//$calculator->run('*', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
//
//echo $calculator;
//
///* ------------------------------------------------- *\
//    Ex Trans a decimal number to a binary number
//\* ------------------------------------------------- */
//
//require_once __DIR__ . '/Binary/Binary.php';
//
//$binary = new Binary();
//
//$binary->decbn(57);
//echo $binary;
//
///* ------------------------------------------------- *\
//    Ex Lamp Button
//\* ------------------------------------------------- */
//
//require_once __DIR__ . '/Button/Lamp.php';
//require_once __DIR__ . '/Button/Button.php';
//
//$lamp = new Button(new Lamp);
//
//echo $lamp->switchDevice();
//var_dump($lamp);
//echo $lamp->switchDevice();
//var_dump($lamp);
//echo $lamp->switchDevice();
//var_dump($lamp);
//echo $lamp->switchDevice();

/* ------------------------------------------------- *\
    Chainer les méthodes
\* ------------------------------------------------- */

class ModelExample
{
    public function select($args)
    {
        return $this; // retourne l'objet dans le script
    }

    public function where($field, $operator, $value)
    {
        return $this;
    }

    public function get()
    {
        return "results";
    }
}


$modelExample = new ModelExample;

echo $modelExample->select('foo')->where('id', '=', 1)->get();
