<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:20
 */

namespace Product;

use ValueObjects\Money\Money;
use Product\Entities\Product;

interface PricePolicy {
    /**
     * @param Product $product
     * @return Money
     */
    public function getPrice(Product $product);
} 