<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:19
 */

namespace Basket;

use Basket\Entities\Basket;
use Basket\Exception\BasketNotFoundException;
use Rhumsaa\Uuid\Uuid;

interface Repository {

    /**
     * @param Uuid $id
     * @return Basket
     * @throws BasketNotFoundException
     */
    public function getById(Uuid $id);
} 