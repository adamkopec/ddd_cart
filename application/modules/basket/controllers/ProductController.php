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
                    $result = $handler->handle($form->getValues());
                    if (!$result->hasErrors()) {
                        $this->_helper->flashMessenger->addMessage(['success', 'Produkt został dodany do koszyka']);
                        $this->_redirectToBasket();
                    } else {
                        $this->_helper->flashMessenger->addMessage(['warning', join(', ', $result->getErrors())]);
                    }
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(['danger', 'Wystąpił błąd podczas dodawania produktu do koszyka']);
                    //$this->_helper->flashMessenger->addMessage(['danger', (string)$e]);
                }
            } else {
                $this->_helper->flashMessenger->addMessage(['danger', 'Produkt nie został dodany do koszyka, przesłane dane były niepoprawne']);
            }
        }

        $this->_redirectToCatalog();
    }

    private function _redirectToCatalog() {
        return $this->_helper->redirector->goToRoute(array(), 'catalog', true);
    }

    private function _redirectToBasket() {
        return $this->_helper->redirector->goToRoute(array(), 'basket', true);
    }
}