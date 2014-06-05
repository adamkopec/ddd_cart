<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        /** @var \Bootstrap $bootstrap */
        $productRepository = $bootstrap->getResource('container')->get('repository.product');
        /** @var  Product\Repository $productRepository */
        $this->view->products = $productRepository->getAll();
    }
}

