<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:25
 */

namespace Customer\Repository;

use Customer\Entities\Customer;
use Customer\Exception\CustomerNotFoundException;
use Customer\Repository;
use Customer\Factory;
use Rhumsaa\Uuid\Uuid;

class CurrentSession implements Repository {
    /** @var  string */
    protected $namespaceName;
    /** @var  \Zend_Session_Namespace */
    protected $session;
    /** @var  Factory */
    protected $factory;

    /**
     * @param string $namespaceName
     * @param Factory $factory
     */
    public function __construct($namespaceName, Factory $factory) {
        $this->namespaceName = $namespaceName;
        $this->factory = $factory;
    }

    /**
     * @return Customer
     * @throws CustomerNotFoundException
     */
    public function getCurrent() {
        if (!$this->session) {
            $this->_initSession();
        }

        if (!isset($this->session->customer)) {
            $this->session->customer = $this->factory->createCustomer();
        }

        return $this->session->customer;
    }

    /**
     * @param Uuid $id
     * @return Customer
     * @throws CustomerNotFoundException
     */
    public function getById(Uuid $id) {
        return $this->getCurrent();
    }


    private function _initSession() {
        $this->session = new \Zend_Session_Namespace($this->namespaceName);
    }
} 