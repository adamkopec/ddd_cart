<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 17:02
 */

namespace Basket\Service\LocationService;

use Basket\Entities\Basket;
use Basket\Service\LocationService;
use Customer\Entities\Customer;

class OnePerCustomer implements LocationService {

    /**
     * @param Customer $c
     * @return Basket
     */
    public function getByCustomer(Customer $c) {

    }
} 