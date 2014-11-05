<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 17:06
 */

namespace Infrastructure;

class IdentityMap implements \Countable {

    private $map = [];
    /** @var  IdentityResolver */
    private $resolver;

    /**
     * @param IdentityResolver $resolver
     * @param array $registeredValues
     */
    public function __construct(IdentityResolver $resolver, array $registeredValues = array()) {
        $this->resolver = $resolver;

        if (count($registeredValues) > 0) {
            foreach ($registeredValues as $value) {
                $this->register($value);
            }
        }
    }


    /**
     * @param mixed $offset
     * @throws \InvalidArgumentException
     * @return boolean true on success or false on failure.
     */
    public function hasIdentity($offset) {
        $offset = $this->_resolveOffset($offset);
        return array_key_exists($offset, $this->map);
    }

    /**
     * @param mixed $offset
     * @throws \OutOfBoundsException
     * @return mixed Can return all value types.
     */
    public function getIdentity($offset) {
        $offset = $this->_resolveOffset($offset);
        $this->_validatePresence($offset);
        return $this->map[$offset];
    }

    /**
     * @param mixed $value
     * @throws \InvalidArgumentException
     * @return void
     */
    public function register($value) {
        try {
            $type = $this->resolver->resolveType($value);
            $this->map[$type] = $value;
        } catch (\Exception $e) {
            throw new \InvalidArgumentException(
                sprintf("Value %s cannot be resolved into a valid class name", (string)$value)
            );
        }
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset) {
        $offset = $this->_resolveOffset($offset);
        $this->_validatePresence($offset);
        unset($this->map[$offset]);
    }

    /**
     * @return int The custom count as an integer.
     */
    public function count() {
        return count($this->map);
    }

    /**
     * @param $offset
     * @return string
     */
    private function _resolveOffset($offset) {
        if (is_object($offset)) {
            $offset = get_class($offset);
            return $offset;
        } else {
            throw new \InvalidArgumentException("Identity map is indexed by object types");
        }
    }

    private function _validatePresence($offset) {
        if (!array_key_exists($offset, $this->map)) {
            throw new \OutOfBoundsException(
                sprintf("No identity defined for class %s", $offset)
            );
        }
    }
} 