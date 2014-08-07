<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:18
 */

namespace Customer\Entities;

use Rhumsaa\Uuid\Uuid;

class Customer {
    /** @var  Uuid */
    private $id;

    public function __construct(Uuid $id) {
        $this->id = $id;
    }

    /**
     * @return \Rhumsaa\Uuid\Uuid
     */
    public function getId() {
        return $this->id;
    }
} 