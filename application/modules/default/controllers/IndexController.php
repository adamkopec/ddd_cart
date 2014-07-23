<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $container = $this->_helper->container();
        /** @var Infrastructure\Model $model */
        $model = $container->get('front.product.model.catalog');
        $this->view->assign($model->getValues());
    }
}

