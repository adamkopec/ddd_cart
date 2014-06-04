<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:48
 */

namespace Application\Product\Factory;

use Application\Product\Entities;
use Application\Product\Factory;
use Application\Product\Entities\Product;
use Rhumsaa\Uuid\Uuid;

class SimpleFactory implements Factory {
    /**
     * @return Entities\Product
     */
    public function create() {
        return new Product(Uuid::uuid4());
    }
} 