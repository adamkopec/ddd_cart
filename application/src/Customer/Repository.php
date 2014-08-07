<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:19
 */

namespace Customer;

use Customer\Entities\Customer;
use Customer\Exception\CustomerNotFoundException;
use Rhumsaa\Uuid\Uuid;

interface Repository {

    /**
     * @return Customer
     * @throws CustomerNotFoundException
     */
    public function getCurrent();

    /**
     * @param Uuid $id
     * @return Customer
     * @throws CustomerNotFoundException
     */
    public function getById(Uuid $id);
} 