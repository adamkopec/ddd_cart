<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:29
 */

namespace Product\UpdateStack\Factory;

use Common\Unit;
use Product\Entities\Product;
use Product\PricePolicy\Constant;
use Product\UpdateStack\Factory;
use ValueObjects\Money\Money;

class Doctrine implements Factory {
    /**
     * @param \OrmProduct $source
     * @return Product
     */
    public function create($source) {
        //nie przechowujemy na razie innych wariantów polityk
        $p = new Product($source->id, new Constant(Money::fromNative($source->catalog_price, 'PLN')));
        $p->setName($source->name);
        $p->setBaseUnit(new Unit($source->OrmUnit->symbol));

        return $p;
    }

} 