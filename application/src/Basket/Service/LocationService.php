<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 17:13
 */

namespace Basket\Service;

use Customer\Entities\Customer as Customer;
use Basket\Entities\Basket as Basket;

interface LocationService {

    /**
     * @param Customer $c
     * @return Basket
     */
    public function getByCustomer(Customer $c);
} 