<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.12.14
 * Time: 16:50
 */

namespace Infrastructure;


class EmailAddress {

    /** @var string */
    private $email;

    public function __construct($email) {
        $this->validateEmail($email);
        $this->email = $email;
    }

    private function validateEmail($email) {
        //fixmy: zrobić
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }
} 