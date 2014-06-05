<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:47
 */

namespace Product;

interface Factory {
    /**
     * @return Entities\Product
     */
    public function create();
} 