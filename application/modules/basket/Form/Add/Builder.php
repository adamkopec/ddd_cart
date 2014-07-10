<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 16:53
 */

class Basket_Form_Add_Builder implements Infrastructure\Form\Builder {

    /**
     * @return \Zend_Form
     */
    public function getForm() {
        return new Basket_Form_Add();
    }

} 