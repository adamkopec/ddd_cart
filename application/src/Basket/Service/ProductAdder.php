<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:08
 */

namespace Basket\Service;

use Product\Entities\Product;
use Basket\Entities\Basket;

interface ProductAdder {
    public function add(Product $product, Basket $basket);
} 