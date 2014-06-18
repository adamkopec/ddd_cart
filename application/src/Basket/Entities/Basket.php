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

class Basket extends AggregateRoot {

    private $products = [];
    /** @var  Specification */
    private $specification;

    public function __construct(Specification $specification) {
        $this->specification = $specification;
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