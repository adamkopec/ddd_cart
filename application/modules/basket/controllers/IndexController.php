<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 16:55
 */

class Basket_IndexController extends Zend_Controller_Action {

    public function indexAction() {
        try {
            $container = $this->_helper->container();
            $customer = $container->get('customer.repository')->getCurrent();
            /** @var Basket_Model_Overview $model */
            $model = $container->get('front.basket.model.overview');
            $model->setCustomer($customer);
            $this->view->assign($model->getValues());
        } catch (\Basket\Exception\BasketNotFoundException $e) {
            $this->_helper->flashMessenger->addMessage(['warning', "Nie znaleziono koszyka dla aktualnie zalogowanego klienta"]);
            $this->_redirectToCatalog();
        }
    }

    private function _redirectToCatalog() {
        return $this->_helper->redirector->goToRoute(array(), 'catalog', true);
    }
}