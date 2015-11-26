<?php

/*----------------------------- exercice 1 ---------------------------------------------------------------------------*/

$data=['naoudi', 'antoine', 'cecile', 'fenley'];

$output = array_map(function($item){
    return ucwords($item);
}, $data);

var_dump('$output sortie de la fonction array_map');
var_dump($output);


var_dump('------ exercice 2 -------');

function bar(Closure $foo) {
    $foo();
}

bar(function(){ echo "hello bar"; });

/*----------------------------- exercice 3 ---------------------------------------------------------------------------*/
var_dump('------ exercice 3: passage par ref -------');

$t = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
array_walk($t, function (&$val) {
    $val += 1;
});
var_dump($t);

/*----------------------------- exercice 4 ---------------------------------------------------------------------------*/
var_dump('------ exercice 4 -------');

$fermeture = ['a', 'b', 'c', 'd'];

$func = function ($arg) use (&$fermeture){
    $fermeture=array_merge($fermeture, str_split($arg));
};

$func('efghijk');

var_dump($fermeture);

var_dump('------ fermeture lexicale -------');


var_dump('------------ exercice 5 ----------');


class Product{

    private $price;
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = (float) $price;
    }

}


class Cart{
    private $p=[];
    public function addProduct($k,$p){
        $this->p[$k]= (float) $p;
    }
    public function getTotal($tax)
    {
        $sum=0;
        array_walk($this->p,function($val)use($tax, &$sum){
            $sum += $val*($tax+1.0);
        } );
        return $sum;
    }
}

$cart = new Cart;

$cart->addProduct('apple', 10);
$cart->addProduct('rasberry', 45);

echo $cart->getTotal(0.196);

var_dump('------- static private-------');
$sum=function($v){
    return function() use($v){
        return ++$v;
    };
};

$r = $sum(10);
echo $r();
$r= $sum(10);
echo $r();

var_dump('---------- Exemple de contexte global pour une variable PHP');
$val=10;

function baz(){
    $val = 11;  // contexte parent
    function bu(){
        global $val; //contexte global pour la variable $val
        echo $val; // affichera 10 et pas 11
    }
    bu();
}

baz(); // affichera 10

$arg=10;
$func=function () {
    $arg=1; // contexte parent
    $a=function()use ($arg){
        echo $arg;
    };
    $a();
};
$func(); // affichera 1 et pas 10

