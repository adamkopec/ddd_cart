<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:16
 */

namespace Basket\Product\Factory;

use Basket\Product\Factory;
use Product\Entities\Product as CatalogProduct;
use Basket\Entities\Product as BasketProduct;
use Rhumsaa\Uuid\Uuid;

class Simple implements Factory {

    /**
     * @param CatalogProduct $product
     * @return BasketProduct
     */
    public function createFromProduct(CatalogProduct $product) {
        $basketProduct = new BasketProduct(Uuid::uuid4());
        $basketProduct->setPrice($product->getPrice());
        return $basketProduct;
    }

} 