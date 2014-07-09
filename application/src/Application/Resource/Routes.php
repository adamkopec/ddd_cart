<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 19.06.2014
 * Time: 16:08
 */

namespace Application\Resource;


class Routes extends \Zend_Application_Resource_ResourceAbstract {

    protected $files = [];
    protected $router;

    /**
     * Strategy pattern: initialize resource
     *
     * @return mixed
     */
    public function init() {
        $bootstrap = $this->getBootstrap();
        $bootstrap->bootstrap('FrontController');
        $this->router = $bootstrap->getContainer()->frontcontroller->getRouter();

        foreach ($this->files as $file) {
            $this->router->addConfig(new \Zend_Config_Yaml($file));
        }

        return $this->router;
    }

    public function setFiles(array $files) {
        $this->files = $files;
    }
} 