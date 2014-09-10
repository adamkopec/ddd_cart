<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:03
 */

class Basket_Bootstrap extends Zend_Application_Module_Bootstrap {

    protected function _initResources() {
        $resourceLoader = $this->getResourceLoader();
        $resourceLoader->addResourceType('model', 'Model/', 'Model');
    }
} 