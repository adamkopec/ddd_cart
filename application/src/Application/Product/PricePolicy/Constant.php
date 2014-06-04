<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:36
 */

namespace Application\Product\PricePolicy;

use Application\Product\PricePolicy;
use Application\Product\PriceType;
use ValueObjects\Money\Money;

class Constant implements PricePolicy {

    private $value;

    public function __construct(Money $value) {
        $this->value = $value;
    }

    /**
     * @param PriceType $priceType
     * @return Money
     */
    public function getPrice(PriceType $priceType) {
        // TODO: Implement getPrice() method.
        //czas na małą refaktoryzację
    }
} 