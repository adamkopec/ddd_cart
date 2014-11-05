<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 16.06.2014
 * Time: 20:52
 */

define('ROOT_PATH', realpath(dirname(__FILE__) . '/../') . '/');

// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__)));

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

require_once __DIR__ . '/../vendor/autoload.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.yml'
);