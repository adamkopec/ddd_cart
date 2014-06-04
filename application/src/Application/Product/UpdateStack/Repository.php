<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:31
 */

namespace Application\Product\UpdateStack;

use Application\Product\Entities\Product;
use Rhumsaa\Uuid\Uuid;

interface Repository {
    /**
     * @param Uuid $id
     * @return Product
     * @throws ProductNotFoundException
     */
    public function getById(Uuid $id);

    public function persist(Product $p);
} 