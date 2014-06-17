<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initPluginPath() {
        $this->getPluginLoader()->addPrefixPath("Application\\Resource",APPLICATION_PATH."/src/Application/Resource/");
    }
}