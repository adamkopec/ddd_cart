<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:11
 */

namespace Basket\Service\SpecificationProvider;

use Basket\Service\SpecificationProvider;
use Basket\Specification;
use ValueObjects\Money\Money;

class Example implements SpecificationProvider {
    /**
     * @return Specification
     */
    public function getSpecification()
    {
        return new Specification\AndSpecification(
            new Specification\MaxQuantity(10),
            new Specification\MaxValue(Money::fromNative(1000, 'PLN'))
        );
    }

} 