<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.06.2014
 * Time: 22:49
 */

namespace Product\ReadStack;

use Product\ProductData;

interface Repository {
    /**
     * @return ProductData[]
     */
    public function getAll();

    /**
     * @param string $name
     * @return ProductData[]
     */
    public function getByName($name);
} 