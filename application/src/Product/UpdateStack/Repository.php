<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:31
 */

namespace Product\UpdateStack;

use Product\Entities\Product;
use Product\Exception\ProductNotFoundException;
use Product\Exception\ProductPersistenceException;
use Rhumsaa\Uuid\Uuid;

interface Repository {
    /**
     * @param Uuid $id
     * @return Product
     * @throws ProductNotFoundException
     */
    public function getById(Uuid $id);

    /**
     * @param Product $p
     * @return void
     * @throws ProductPersistenceException
     */
    public function persist(Product $p);
} 