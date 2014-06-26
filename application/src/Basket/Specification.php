<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:01
 */

namespace Basket;

use Basket\Entities\Product;

interface Specification {
    /**
     * @param Product $product
     * @return bool
     */
    public function isMetBy(Product $product);
} 