<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 16:37
 */

namespace Product\PricePolicy;

use Product\Entities\Product;
use Product\PricePolicy;
use ValueObjects\Money\Money;
use Assert\Assertion;

class MultipliedByFactor implements PricePolicy {
    /**
     * @var Money
     */
    private $value;
    /**
     * @var double
     */
    private $factor;

    public function __construct(Money $value, $factor) {
        $this->value = $value;
        $this->factor = $factor;

        Assertion::min($value->getAmount(), 0, "Value is less than zero");
        Assertion::min($factor, 0, "Value is less than zero after multiplication by factor");
    }

    /**
     * @param Product $product
     * @return Money
     */
    public function getPrice(Product $product) {
        return $this->value * $this->factor;
    }

} 