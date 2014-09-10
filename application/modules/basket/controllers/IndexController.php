<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 16:55
 */

class Basket_IndexController extends Zend_Controller_Action {

    public function indexAction() {
        $basketProductRepository = $this->_helper->container()->get('basket.front.repository');

        $this->view->basketProducts = $basketProductRepository->get
    }
} 