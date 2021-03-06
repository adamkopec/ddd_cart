<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 16:57
 */

namespace Product\Factory;

use ValueObjects\Money\Money;
use Product\Entities;
use Product\Factory;
use Product\Entities\Product;
use Product\PricePolicy\Constant;
use Rhumsaa\Uuid\Uuid;

class TableRowBasedFactory implements Factory {

    private $product;

    public function __construct(\OrmProduct $product) {
        $this->product = $product;
    }

    /**
     * @return Entities\Product
     */
    public function create() {
        return new Product(
            Uuid::fromString($this->product->id),
            new Constant(Money::fromNative($this->product->catalog_price, 'PLN'))
        );
    }

} 