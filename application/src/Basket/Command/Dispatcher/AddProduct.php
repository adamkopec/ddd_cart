<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 16:17
 */

namespace Basket\Command\Dispatcher;

use Basket\Command\AddProduct as Command;
use Customer\Repository as CustomerRepository;
use Basket\Service\LocationService;

class AddProduct {
    /** @var  CustomerRepository */
    private $customerRepository;
    /** @var  LocationService */
    private $basketLocationService;

    public function dispatch(Command $c) {
        $customer = $this->customerRepository->getById($c->getCustomerId());

        $basket = $this->basketLocationService->getActiveBasket($customer);

        //$basket->
    }
} 