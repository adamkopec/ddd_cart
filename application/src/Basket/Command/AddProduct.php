<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 24.07.2014
 * Time: 16:49
 */

namespace Basket\Command;

use Rhumsaa\Uuid\Uuid;

class AddProduct {
    /** @var  int */
    protected $quantity;
    /** @var  Uuid */
    protected $productId;
    /** @var  Uuid */
    protected $customerId;

    public function __construct(Uuid $customerId, Uuid $productId, $quantity) {
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->quantity = (int)$quantity;
    }

    /**
     * @return Uuid
     */
    public function getCustomerId() {
        return $this->customerId;
    }

    /**
     * @return Uuid
     */
    public function getProductId() {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }
} 