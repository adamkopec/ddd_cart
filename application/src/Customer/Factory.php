<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:30
 */

namespace Customer;

use Customer\Entities\Customer;

interface Factory {
    /**
     * @return Customer
     */
    public function createCustomer();
} 