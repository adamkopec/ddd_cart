<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:36
 */

namespace Product\PricePolicy;

use Product\PricePolicy;
use Product\Entities\Product;
use ValueObjects\Money\Money;
use Assert\Assertion;



class Constant implements PricePolicy {

    private $value;

    public function __construct(Money $value) {
        $this->value = $value;
        Assertion::min($value->getAmount()->toNative(), 0, "Price value is less than zero");
    }

    /**
     * @param Product $product
     * @return Money
     */
    public function getPrice(Product $product) {
        return $this->value;
    }
} 