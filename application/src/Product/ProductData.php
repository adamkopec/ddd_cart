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
    private $catalogPrice;
    /** @var  bool */
    private $archived;
    /** @var  string */
    private $unitSymbol;

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
    public function setCatalogPrice($sellingPrice) {
        $this->catalogPrice = $sellingPrice;
    }

    /**
     * @return \ValueObjects\Money\Money
     */
    public function getCatalogPrice() {
        return $this->catalogPrice;
    }

    /**
     * @param string $unitName
     */
    public function setUnitSymbol($unitName) {
        $this->unitSymbol = $unitName;
    }

    /**
     * @return string
     */
    public function getUnitSymbol() {
        return $this->unitSymbol;
    }
} 