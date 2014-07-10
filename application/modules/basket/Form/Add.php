<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 16:58
 */

class Basket_Form_Add extends Zend_Form {

    public function init() {
        $this->addElement('hidden', 'productId', array(
            'validators' => array(
                'Int',
                array('Range', false, array('min' => 0))
            )
        ));
        $this->addElement('hidden', 'quantity', array(
            'validators' => array(
                'Int',
                array('Range', false, array('min' => 0, 'max' => 99))
            )
        ));
        $this->addElement('submit', 'submit');
    }
} 