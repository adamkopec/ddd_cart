<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:30
 */

namespace Basket;

use Basket\Entities\Basket;

interface Factory {
    /**
     * @return Basket
     */
    public function createBasket();
} 