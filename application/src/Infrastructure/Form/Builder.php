<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 16:54
 */

namespace Infrastructure\Form;

interface Builder {

    /**
     * @return \Zend_Form
     */
    public function getForm();
} 