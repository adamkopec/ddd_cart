<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initPluginPath() {
        $this->getPluginLoader()->addPrefixPath("Application\\Resource",APPLICATION_PATH."/src/Application/Resource/");
    }

    protected function _initActionHelpers() {
        Zend_Controller_Action_HelperBroker::addPath(
            'Application/Controller/Action/Helper',
            'Application\\Controller\\Action\\Helper'
        );
    }
}