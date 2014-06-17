<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 19:19
 */

namespace Application\Resource;


class Doctrine extends \Zend_Application_Resource_ResourceAbstract {

    /**
     * Strategy pattern: initialize resource
     * @return mixed
     */
    public function init() {
        $manager = \Doctrine_Manager::getInstance();
        $manager->setAttribute(\Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        $manager->setAttribute(
            \Doctrine_Core::ATTR_MODEL_LOADING,
            \Doctrine_Core::MODEL_LOADING_CONSERVATIVE
        );

        $connections = $this->_getConnections();

        foreach ($connections as $connectionName => $connection) {
            $conn = \Doctrine_Manager::connection($connection, $connectionName);
            $conn->setAttribute(\Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);
            $conn->setAttribute(\Doctrine_Core::ATTR_VALIDATE, \Doctrine_Core::VALIDATE_ALL);
            $conn->setAttribute(\Doctrine_Core::ATTR_EXPORT, \Doctrine_Core::EXPORT_ALL);
        }
    }

    protected function _getConnections() {
        $options = $this->getOptions();
        $connections = array();
        if (isset($options['connections']) && is_array($options['connections'])) {
            $connections = $options['connections'];
        }
        return $connections;
    }

}