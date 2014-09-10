<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:33
 */

namespace Infrastructure;


class DoctrineRepository {

    private $factory;

    public function __construct($factory) {
        $this->factory = $factory;
    }

    /**
     * @param object[] $ormObjects
     * @return array
     */
    protected function _hydrate($ormObjects) {
        $ret = array();
        foreach ($ormObjects as $orm) {
            $ret[] = $this->factory->create($orm);
        }
        return $ret;
    }

    /**
     * @param \Doctrine_Query $q
     * @return array
     */
    protected function _toArray(\Doctrine_Query $q) {
        $objects = $q->execute();
        if ($objects) {
            return $this->_hydrate($objects);
        } else {
            return array();
        }
    }

    /**
     * @param \Doctrine_Query $q
     * @return array
     */
    protected function _getOne(\Doctrine_Query $q) {
        $object = $q->fetchOne();
        if ($object) {
            return $this->_hydrate([$object])[0];
        } else {
            return null;
        }
    }
} 