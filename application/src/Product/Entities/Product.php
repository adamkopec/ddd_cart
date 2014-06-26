<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:40
 */

namespace Product\Entities;

use Rhumsaa\Uuid\Uuid;
use Infrastructure\AggregateRoot;
use Product\Exception\ProductInvariantException;
use Product\PricePolicy;
use Common\Unit;

class Product extends AggregateRoot {
    /** @var  Uuid $id */
    private $id;
    /** @var  string */
    private $name;
    /** @var  bool */
    private $archived;
    /** @var  PricePolicy */
    private $pricePolicy;
    /** @var  Unit */
    private $baseUnit;

    public function __construct(Uuid $id, PricePolicy $policy) {
        $this->id = $id;
        $this->pricePolicy = $policy;
    }

    /** @param string $name */
    public function setName($name) {
        $this->name = $name;
    }

    /** @return string */
    public function getName() {
        return $this->name;
    }

    /** @return \Rhumsaa\Uuid\Uuid */
    public function getId() {
        return $this->id;
    }

    /**
     * @return \Common\Unit
     */
    public function getBaseUnit() {
        return clone $this->baseUnit;
    }

    public function archive() {
        if ($this->archived) {
            throw new ProductInvariantException("Archived product cannot be archived once more");
        }

        $this->archived = true;
        $this->notify('product.archived', array($this->getId()));
    }

    /**
     * @return \ValueObjects\Money\Money
     */
    public function getPrice() {
        return $this->pricePolicy->getPrice($this);
    }
} 