<?php

class Cart
{
    /**
     * @var array
     */
    private $storage = null;

    public function __construct(Storable $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param Product $product
     * @param $quantity
     * @return $this
     */
    public function buy($product, $quantity)
    {
        $quantity = abs((int) $quantity);

        $this->storage->setValue($product->name, (float) $product->price * $quantity );

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function restore(Product $product)
    {
        $this->storage->restore($product->name);

        return $this;
    }

    /**
     * sum cart product
     * @return number
     */
    public function total()
    {
        return $this->storage->total();
    }

    /**
     * reset cart
     */
    public function reset()
    {
        $this->storage->reset();
    }

//    public function getCart()
//    {
//        $products = $this->storage->all();
//
//        return $this->hydrate($products);
//    }

}