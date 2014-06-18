<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:09
 */

namespace Basket\Service\ProductAdder;

use Basket\Entities\Basket;
use Basket\Service\ProductAdder;
use Product\Entities\Product;

class Simple implements ProductAdder {
    /** @var  Factory */
    private $factory;

    public function __construct(Factory $factory) {
        $this->factory = $factory;
    }

    public function add(Product $product, Basket $basket) {
        $basketProduct = $this->factory->createFromProduct($product);
        $basket->addProduct($basketProduct);
    }
} 