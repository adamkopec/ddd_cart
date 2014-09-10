<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:21
 */

namespace Product\ReadStack\Repository;

use Infrastructure\DoctrineRepository;
use Product\ProductData;
use Product\ReadStack\Repository;
use Product\ReadStack\Factory;

class Doctrine extends DoctrineRepository implements Repository {

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
            ->leftJoin('p.OrmUnit u');
        return $q;
    }

} 