<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:30
 */

namespace Customer\Factory;

use Customer\Entities\Customer;
use Customer\Factory;
use Rhumsaa\Uuid\Uuid;

class SessionIdBased implements Factory {

    /**
     * @return Customer
     */
    public function createCustomer() {
        $sessionId = \Zend_Session::getId();
        $customerUuid = Uuid::uuid5(Uuid::NAMESPACE_OID, $sessionId);
        return new Customer($customerUuid);
    }

} 