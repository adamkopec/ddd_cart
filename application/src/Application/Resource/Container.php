<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.06.2014
 * Time: 22:07
 */

namespace Application\Resource;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


class Container extends \Zend_Application_Resource_ResourceAbstract {

    /**
     * Strategy pattern: initialize resource
     * @return mixed
     */
    public function init() {

        $options = $this->getOptions();
        $configs = isset($options['configs']) ? $options['configs'] : array();
        $configPath = $options['configPath'];

        $container = new ContainerBuilder();
        foreach ($configs as $configFile) {
            $loader = new YamlFileLoader($container, new FileLocator($configPath));
            $loader->load($configFile);
        }

        return $container;
    }

} 