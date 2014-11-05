<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:25
 */

namespace Basket\Repository;

use Basket\Entities\Basket;
use Basket\Exception\BasketNotFoundException;
use Basket\Repository;
use Rhumsaa\Uuid\Uuid;

class CurrentSession implements Repository {
    /** @var  string */
    protected $namespaceName;
    /** @var  \Zend_Session_Namespace */
    protected $session;

    /**
     * @param string $namespaceName
     */
    public function __construct($namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * @param Uuid $id
     * @return Basket
     * @throws BasketNotFoundException
     */
    public function getById(Uuid $id) {
        $this->_initSession();
        $stringId = $id->toString();
        if (isset($this->session->basket)) {
            return $this->session->basket;
        } else {
            throw new BasketNotFoundException("No baskets found with id $stringId");
        }
    }

    /**
     * @param Uuid $id
     * @return Basket
     * @throws BasketNotFoundException
     */
    public function getByCustomerId(Uuid $id) {
        $this->_initSession();
        if (isset($this->session->basket)) {
            return $this->session->basket;
        } else {
            throw new BasketNotFoundException("No baskets found for customer $id");
        }
    }

    /**
     * @param Basket $basket
     * @return void
     */
    public function persist(Basket $basket) {
        $this->session->basket = $basket;
    }

    private function _initSession() {
        $this->session = new \Zend_Session_Namespace($this->namespaceName);
    }
} 