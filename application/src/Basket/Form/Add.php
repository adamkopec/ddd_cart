<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 16:58
 */

namespace Basket\Form;

class Add extends \Zend_Form {

    public function init() {
        $this->addElement('hidden', 'productId', array(
            'validators' => array(
                array('StringLength', false, array('min' => 36, 'max' => 36))
            ),
            'decorators' => ['ViewHelper']
        ));
        $this->addElement('select', 'quantity', array(
            'validators' => array(
                'Int',
                array('Between', false, array('min' => 0, 'max' => 99))
            ),
            'decorators' => ['ViewHelper'],
            'multiOptions' => array(1,5,10)
        ));
        $this->addElement('submit', 'submit');
    }
} 