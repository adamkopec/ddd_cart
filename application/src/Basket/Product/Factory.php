<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:12
 */

namespace Basket\Product;

use Product\Entities\Product;

interface Factory {
    public function createFromProduct(Product $product);
} 