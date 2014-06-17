<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 17.06.2014
 * Time: 20:59
 */
require dirname(__FILE__).'/../application/init.php';

$application->bootstrap();

$doctrineConfig = $application->getOptions()['resources']['doctrine']['config'];
$cli = new Doctrine_Cli($doctrineConfig);
$cli->run($_SERVER['argv']);