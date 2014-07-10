<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:12
 */

namespace Basket\Product;

use Product\Entities\Product;
use Basket\Entities\Product as BasketProduct;

interface Factory {
    /**
     * @param Product $product
     * @return BasketProduct
     */
    public function createFromProduct(Product $product);
} 