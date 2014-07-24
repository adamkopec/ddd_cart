<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 16:53
 */

namespace Basket\Form\Add;

class Builder implements \Infrastructure\Form\Builder {
    /** @var string  */
    private $productId;

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId) {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductId() {
        return $this->productId;
    }

    /**
     * @return \Zend_Form
     */
    public function getForm() {
        $form = new \Basket\Form\Add();
        if (!is_null($this->productId)) {
            $form->setDefault('productId', $this->productId);
        }
        return $form;
    }

} 