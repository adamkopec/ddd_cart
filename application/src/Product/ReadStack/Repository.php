<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.06.2014
 * Time: 22:49
 */

namespace Product\ReadStack;

use Product\ProductData;
use Rhumsaa\Uuid\Uuid;

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

    /**
     * @param Uuid $uuid
     * @return ProductData
     */
    public function getById(Uuid $uuid);
} 