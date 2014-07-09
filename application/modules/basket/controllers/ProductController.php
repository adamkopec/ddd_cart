<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 09.07.2014
 * Time: 22:32
 */

class Basket_ProductController extends Zend_Controller_Action {

    public function addAction() {
        $builder = $this->_helper->container()->get('basket.forms.add.builder');
        $form = $builder->getForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                try {
                    $handler = $this->_helper->container()->get('basket.forms.add.handler');
                    $handler->handle($form->getValues());
                    $this->_helper->flashMessenger->addMessage(['OK', 'Produkt został dodany do koszyka']);
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(['ERR', 'Wystąpił błąd podczas dodawania produktu do koszyka']);
                }
            } else {
                $this->_helper->flashMessenger->addMessage(['ERR', 'Produkt nie został dodany do koszyka, przesłane dane były niepoprawne']);
            }
        }

        $this->_redirectToCatalog();
    }

    private function _redirectToCatalog() {
        return $this->_helper->redirector->goToRoute(array(), 'catalog', true);
    }
}