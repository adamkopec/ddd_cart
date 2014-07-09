<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 26.06.2014
 * Time: 16:18
 */

namespace Basket\Specification;

use Basket\Entities\Product;
use Basket\Specification;
use ValueObjects\Money\Money;

class MaxValue implements Specification {
    /** @var  Money */
    private $maxValue;

    public function __construct(Money $maxValue) {
        $this->maxValue = $maxValue;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function isMetBy(Product $product) {
        if ($product->getTotal()->getAmount() <= $this->maxValue->getAmount()) {
            return true;
        } else {
            return false;
        }
    }

} 