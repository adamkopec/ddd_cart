<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 23:21
 */

namespace Product\UpdateStack\Repository;

use Infrastructure\DoctrineRepository;
use Product\Entities\Product;
use Product\Exception\ProductPersistenceException;
use Product\UpdateStack\Repository;
use Product\UpdateStack\Factory;
use Rhumsaa\Uuid\Uuid;

class Doctrine extends DoctrineRepository implements Repository {

    /**
     * @param Uuid $id
     * @return Product
     */
    public function getById(Uuid $id) {
        $q = $this->_getBaseQuery();
        $q->where('p.id = ?', $id->toString());

        return $this->_getOne($q);
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

    /**
     * @param Product $p
     * @return void
     * @throws ProductPersistenceException
     */
    public function persist(Product $p)
    {
        throw new ProductPersistenceException("Not implemented yet");
    }
} 