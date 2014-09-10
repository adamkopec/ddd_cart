<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:30
 */

namespace Basket\Factory;

use Basket\Entities\Basket;
use Basket\Factory;
use Basket\Service\SpecificationProvider;
use Rhumsaa\Uuid\Uuid;

class Simple implements Factory {

    /** @var  SpecificationProvider */
    private $specificationProvider;

    public function __construct(SpecificationProvider $specificationProvider) {
        $this->specificationProvider = $specificationProvider;
    }

    /**
     * @return Basket
     */
    public function createBasket() {
        $basketUuid = Uuid::uuid4();
        return new Basket($basketUuid, $this->specificationProvider->getSpecification());
    }

} 