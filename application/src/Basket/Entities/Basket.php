<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 16:38
 */

namespace Basket\Entities;

use Infrastructure\AggregateRoot;
use Basket\Exception;
use Basket\Specification;
use ValueObjects\Money\Money;
use Basket\Entities\Product;
use Rhumsaa\Uuid\Uuid;

class Basket extends AggregateRoot {

    /** @var Uuid */
    private $id;
    /** @var Product[]  */
    private $products = [];
    /** @var  Specification */
    private $specification;

    public function __construct(Uuid $id, Specification $specification) {
        $this->specification = $specification;
        $this->id = $id;
    }

    /**
     * @return \Rhumsaa\Uuid\Uuid
     */
    public function getId() {
        return $this->id;
    }

    public function addProduct(Product $product) {
        if ($this->specification->isMetBy($product)) {
            $this->products[] = $product;
        } else {
            throw new Exception("This product cannot be added to this basket");
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts() {
        return $this->products;
    }

    /**
     * @return Money
     */
    public function getTotal() {
        $sum = Money::fromNative(0, 'PLN');
        foreach($this->products as $product) {
            $sum = $sum->add($product->getValue());
        }
        return $sum;
    }
} 