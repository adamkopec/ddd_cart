<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:21
 */

namespace Product\ReadStack\Repository;

use Product\ProductData;
use Product\ReadStack\Repository;
use Product\ReadStack\Factory;

class Doctrine implements Repository {
    /** @var  Factory */
    private $factory;

    public function __construct(Factory $factory) {
        $this->factory = $factory;
    }

    /**
     * @return ProductData[]
     */
    public function getAll() {
        $q = $this->_getBaseQuery();
        return $this->_toArray($q);
    }

    /**
     * @param string $name
     * @return ProductData[]
     */
    public function getByName($name) {
        $q = $this->_getBaseQuery();
        $q->where('p.name = ?', $name);

        return $this->_toArray($q);
    }

    /**
     * @return \Doctrine_Query
     */
    private function _getBaseQuery() {
        $q = \Doctrine_Query::create()
            ->from('OrmProduct p')
            ->leftJoin('p.rules r');
        return $q;
    }

    /**
     * @param \OrmProduct[] $ormProducts
     * @return array
     */
    private function _hydrate($ormProducts) {
        $ret = array();
        foreach($ormProducts as $orm) {
            $ret[] = $this->factory->create($orm);
        }
        return $ret;
    }

    /**
     * @param \Doctrine_Query $q
     * @return array
     */
    private function _toArray(\Doctrine_Query $q) {
        $products = $q->execute();
        if ($products) {
            return $this->_hydrate($products);
        } else {
            return array();
        }
    }
} 