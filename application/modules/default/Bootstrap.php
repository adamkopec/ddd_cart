<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 23.07.2014
 * Time: 23:08
 */

class Default_Bootstrap extends Zend_Application_Module_Bootstrap {

    protected function _initResources() {
        $resourceLoader = $this->getResourceLoader();
        $resourceLoader->addResourceType('model', 'Model/', 'Model');
    }
} 