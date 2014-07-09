<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 26.06.2014
 * Time: 16:25
 */

namespace Basket\Specification;

use Basket\Specification;
use Basket\Entities\Product;

class MaxQuantity implements Specification {
    /** @var int */
    private $maxQuantity;

    public function __construct($maxQuantity) {
        $this->maxQuantity = (int)$maxQuantity;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function isMetBy(Product $product) {
        if ($product->getQuantity() <= $this->maxQuantity) {
            return true;
        } else {
            return false;
        }
    }
} 