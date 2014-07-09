<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 26.06.2014
 * Time: 16:55
 */

namespace Common;

class Unit {
    /** @var string */
    protected $code;

    public function __construct($code) {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }
} 