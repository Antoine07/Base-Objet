<?php

require_once __DIR__ . '/Storable.php';
require_once __DIR__ . '/Cart.php';
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/SessionStorage.php';
require_once __DIR__ . '/Connect.php';
require_once __DIR__ . '/DBStorage.php';

$products = [
    'apple'      => 10.5,
    'raspberry'  => 13,
    'strawberry' => 7.8,
];

foreach ($products as $name => $price) $$name = new Product($name, $price);

$cart = new Cart(new SessionStorage('biocoop'));

$cart->buy($apple, 10);
$cart->buy($raspberry, 10);
$cart->buy($strawberry, 10);

var_dump($cart->total());

$cart->restore($apple);

var_dump($cart->total());

$cart->reset();

var_dump($cart->total());

/* ------------------------------------------------- *\
    DBStorage
\* ------------------------------------------------- */

unset($cart);

exec('sh ./install.sh');

$conn = new Connect(['host' => 'localhost', 'dbname' => 'db_biocoop', 'username' => 'tony', 'password' => 'tony']);

$dbStorage = new DBStorage('products', $conn->getDB());

$cart = new Cart($dbStorage );

$cart->buy($apple, 10);
$cart->buy($raspberry, 10);
$cart->buy($strawberry, 10);

var_dump($cart->total());

//$cart->restore($apple);

var_dump($cart->total());

//$cart->reset();

var_dump($cart->total());




// cart uri


//$productsCart = $cart->getCart();
//
//foreach($productsCart as $p)
//{
//    $product = new Product($p->name, $p->price);
//
//    $quantity = ceil($p->total/$product->price);
//
//    echo "total price : {$p->total}, price HT {$product->price}, price TTC {$product->priceTTC()}, quantity $quantity";
//}
