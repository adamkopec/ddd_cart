<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 17:13
 */

namespace Product\PricePolicy;

use Product\Entities\Product;
use Product\PricePolicy;
use ValueObjects\Money\Money;

class CustomerBased implements PricePolicy {

    private $customerDiscountRepository;

    public function __construct(CustomerDiscountRepository $repository, Customer $customer) {
        $this->customerDiscountRepository = $repository;
        $this->customer = $customer;
    }

    /**
     * @param Product $product
     * @return Money
     */
    public function getPrice(Product $product) {
        $discountPrice = $this->customerDiscountRepository->getDiscountForCustomerAndProduct($this->customer->getId(), $product->getId());
        return $discountPrice;
    }
} 