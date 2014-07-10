<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.06.2014
 * Time: 17:02
 */

namespace Basket\Entities;

use ValueObjects\Money\Money;
use Rhumsaa\Uuid\Uuid;
use Common\Unit;

class Product {
    /** @var  Uuid */
    private $id;
    /** @var  int */
    private $quantity = 0;
    /** @var  Money */
    private $price;
    /** @var  Unit */
    private $unit;

    public function __construct(Uuid $id) {
        $this->id = $id;
    }

    public function getTotal() {
        return $this->price * $this->quantity;
    }

    /**
     * @param \ValueObjects\Money\Money $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return \ValueObjects\Money\Money
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = (int)$quantity;
    }

    /**
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }



}