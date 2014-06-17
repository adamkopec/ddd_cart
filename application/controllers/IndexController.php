<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        /** @var \Bootstrap $bootstrap */
        $productRepository = $bootstrap->getResource('container')->get('front.product.repository');
        /** @var  Product\ReadStack\Repository $productRepository */
        $this->view->products = $productRepository->getAll();
    }
}

