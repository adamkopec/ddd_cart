<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 09.07.2014
 * Time: 22:48
 */

namespace Application\Controller\Action\Helper;


class Container extends \Zend_Controller_Action_Helper_Abstract {
    public function direct() {
        $bootstrap = $this->getActionController()->getInvokeArg('bootstrap');
        /** @var \Bootstrap $bootstrap */
        return $bootstrap->getResource('container');
    }
} 