<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:20
 */

namespace Application\Product;

use ValueObjects\Money\Money;

interface PricePolicy {
    /**
     * @param PriceType $priceType
     * @return Money
     */
    public function getPrice(PriceType $priceType);
} 