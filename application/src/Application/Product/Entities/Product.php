<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:40
 */

namespace Application\Product\Entities;

use Rhumsaa\Uuid\Uuid;
use Infrastructure\AggregateRoot;
use Application\Product\Exception\ProductInvariantException;
use Application\Product\PricePolicy;
use Application\Product\PriceType;

class Product extends AggregateRoot {
    /** @var  Uuid $id */
    private $id;
    /** @var  string */
    private $name;
    /** @var  bool */
    private $archived;
    /** @var  PricePolicy */
    private $pricePolicy;

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

    public function archive() {
        if ($this->archived) {
            throw new ProductInvariantException("Archived product cannot be archived once more");
        }

        $this->archived = true;
        $this->notify('product.archived', array($this->getId()));
    }

    /**
     * @param PriceType $priceType
     * @return \ValueObjects\Money\Money
     */
    public function getPrice(PriceType $priceType) {
        return $this->pricePolicy->getPrice($priceType);
    }
} 