<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $productRepository = $this->_helper->container()->get('front.product.repository');
        /** @var  Product\ReadStack\Repository $productRepository */
        $this->view->products = $productRepository->getAll();
    }
}

