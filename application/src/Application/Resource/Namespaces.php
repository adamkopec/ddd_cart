<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 00:09
 */

namespace Application\Resource;


class Namespaces extends \Zend_Application_Resource_ResourceAbstract {

    /**
     * Strategy pattern: initialize resource
     *
     * @return mixed
     */
    public function init() {
        $options = $this->getOptions();
        $namespaces = isset($options['names']) ? $options['names'] : array();

        $autoLoader = \Zend_Loader_Autoloader::getInstance();

        foreach ($namespaces as $namespace) {
            $this->_registerNamespace($autoLoader, $namespace);
        }
    }

    private function _registerNamespace(\Zend_Loader_Autoloader $autoLoader, $namespace) {
        $autoLoader->pushAutoloader($this->_getLoader(), $namespace);
        $this->getBootstrap()
            ->getApplication()
            ->getAutoloader()
            ->registerNamespace($namespace);
    }

    private function _getLoader() {
        $loader = function ($className) {
            $className = str_replace('\\', '/', $className);
            require_once($className . '.php');
        };
        return $loader;
    }

} 