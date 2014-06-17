<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:29
 */

namespace Product\ReadStack;

use Product\ProductData;

interface Factory {
    /**
     * @param object $source
     * @return ProductData
     */
    public function create($source);
} 