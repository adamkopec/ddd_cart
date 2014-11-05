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
use Product\Entities\Product;
use Product\PricePolicy\Constant;
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

        $product = new Product(Uuid::uuid4(), $constantPolicy);
        $product->setName($this->name);
        return $product;
    }
} 