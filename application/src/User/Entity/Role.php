<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.12.14
 * Time: 17:01
 */

namespace User\Entity;


class Role {

    /** @var string */
    private $code;

    public function __construct($code) {
        if (empty($code)) {
            throw new \InvalidArgumentException("Role without code is not allowed");
        }
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }
}