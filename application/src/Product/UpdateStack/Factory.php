<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:29
 */

namespace Product\UpdateStack;

use Product\Entities\Product;

interface Factory {
    /**
     * @param object $source
     * @return Product
     */
    public function create($source);
} 