<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:10
 */

namespace Basket\Service;

use Basket\Specification;

interface SpecificationProvider {

    /**
     * @return Specification
     */
    public function getSpecification();
} 