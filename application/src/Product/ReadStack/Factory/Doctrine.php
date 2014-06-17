<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:29
 */

namespace Product\ReadStack\Factory;

use Product\ProductData;
use Product\ReadStack\Factory;
use ValueObjects\Money\Money;

class Doctrine implements Factory {
    /**
     * @param \OrmProduct $source
     * @return ProductData
     */
    public function create($source) {
        $p = new ProductData();
        $p->setName($source->name);
        $p->setId($source->id);
        $p->setSellingPrice(Money::fromNative($source->catalog_price, 'PLN'));

        //etc.
        return $p;
    }

} 