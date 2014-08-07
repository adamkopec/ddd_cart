<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 17:13
 */

namespace Basket\Service;


interface LocationService {

    public function getByCustomer(Customer $c);
} 