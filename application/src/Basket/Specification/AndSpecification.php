<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 26.06.2014
 * Time: 16:28
 */

namespace Basket\Specification;

use Basket\Entities\Product;
use Basket\Specification;

class AndSpecification implements Specification {
    /**
     * @var Specification
     */
    private $specification1;
    /**
     * @var Specification
     */
    private $specification2;

    public function __construct(Specification $specification1, Specification $specification2) {
        $this->specification1 = $specification1;
        $this->specification2 = $specification2;
    }


    /**
     * @param Product $product
     * @return bool
     */
    public function isMetBy(Product $product) {
        return $this->specification1->isMetBy($product)
            && $this->specification2->isMetBy($product);
    }

} 