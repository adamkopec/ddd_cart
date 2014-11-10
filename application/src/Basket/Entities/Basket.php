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
use Rhumsaa\Uuid\Uuid;
use Basket\Exception\SpecificationException;

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
        $candidate = clone $product;
        $candidateKey = null;
        foreach ($this->products as $key => $existingProduct) {
            if ($existingProduct->getId() == $product->getId()) {
                $candidate->setQuantity($existingProduct->getQuantity() + $product->getQuantity());
                $candidateKey = $key;
                break;
            }
        }

        if ($this->specification->isMetBy($candidate)) {
            if (is_null($candidateKey)) {
                $this->products[] = $candidate;
            } else {
                $this->products[$candidateKey] = $candidate;
            }
        } else {
            throw new SpecificationException("This product cannot be added to this basket");
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