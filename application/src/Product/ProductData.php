<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:31
 */

namespace Product;

use ValueObjects\Money\Money;

class ProductData {
    /** @var  string */
    private $id;
    /** @var  string */
    private $name;
    /** @var  Money */
    private $minimalPrice;
    /** @var  Money */
    private $sellingPrice;
    /** @var  bool */
    private $archived;

    /**
     * @param boolean $archived
     */
    public function setArchived($archived) {
        $this->archived = $archived;
    }

    /**
     * @return boolean
     */
    public function getArchived() {
        return $this->archived;
    }

    /**
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param \ValueObjects\Money\Money $minimalPrice
     */
    public function setMinimalPrice($minimalPrice) {
        $this->minimalPrice = $minimalPrice;
    }

    /**
     * @return \ValueObjects\Money\Money
     */
    public function getMinimalPrice() {
        return $this->minimalPrice;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param \ValueObjects\Money\Money $sellingPrice
     */
    public function setSellingPrice($sellingPrice) {
        $this->sellingPrice = $sellingPrice;
    }

    /**
     * @return \ValueObjects\Money\Money
     */
    public function getSellingPrice() {
        return $this->sellingPrice;
    }
} 