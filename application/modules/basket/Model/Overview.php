<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:02
 */

class Basket_Model_Overview implements Infrastructure\Model {
    /**
     * @var Basket\Repository
     */
    private $repository;

    /**
     * @var \Customer\Entities\Customer
     */
    private $customer;

    public function __construct(Basket\Repository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param \Customer\Entities\Customer $customer
     */
    public function setCustomer($customer) {
        $this->customer = $customer;
    }

    /**
     * @throws RuntimeException
     * @return array
     */
    public function getValues() {
        if (is_null($this->customer)) {
            throw new RuntimeException("There is no customer to fetch basket of");
        }

        $basket = $this->repository->getByCustomer($this->customer);

        return array(
            'basket' => $basket
        );
    }
} 