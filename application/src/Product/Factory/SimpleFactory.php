<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:48
 */

namespace Product\Factory;

use Product\Entities;
use Product\Factory;
use Product\PriceType;
use Product\Entities\Product;
use Product\PricePolicy\Constant;
use Product\PricePolicy\MultipliedByFactor;
use Rhumsaa\Uuid\Uuid;
use ValueObjects\Money\Money;

class SimpleFactory implements Factory {

    private $basePrice;
    private $name;

    public function __construct(Money $basePrice, $name) {
        $this->basePrice = $basePrice;
        $this->name = $name;
    }

    /**
     * @return Entities\Product
     */
    public function create() {
        $constantPolicy = new Constant($this->basePrice);
        $minimalPolicy = new MultipliedByFactor($this->basePrice, 0.9);

        $policies = array(
            PriceType::CATALOG => $constantPolicy,
            PriceType::MINIMAL => $minimalPolicy,
            PriceType::SELLING => $constantPolicy
        );

        $product = new Product(Uuid::uuid4(), $policies);
        $product->setName($this->name);
        return $product;
    }
} 