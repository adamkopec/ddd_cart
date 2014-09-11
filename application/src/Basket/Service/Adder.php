<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 11.09.2014
 * Time: 16:28
 */

namespace Basket\Service;

use Product\Entities\Product;
use Basket\Entities\Basket;

interface Adder {

    /**
     * @param Product $product
     * @param Basket $basket
     * @param int $quantity
     * @return void
     */
    public function add(Product $product, Basket $basket, $quantity);
} 