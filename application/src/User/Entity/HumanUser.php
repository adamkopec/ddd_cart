<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.12.14
 * Time: 16:52
 */

namespace User\Entity;


use Rhumsaa\Uuid\Uuid;

class HumanUser extends User {

    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var  Company */
    private $company;
    /** @var  PhysicalAddress[] */
    private $addresses;

    public function __construct(Uuid $id, $firstName, $lastName) {
        if (empty($firstName) || empty($lastName)) {
            throw new \InvalidArgumentException("Humans have names");
        }

        $this->firstName = (string)$firstName;
        $this->lastName = (string)$lastName;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @return Company
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany($company) {
        $this->company = $company;
    }

    //takie tam, do adresów
} 