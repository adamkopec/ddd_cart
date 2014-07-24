<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 17:03
 */

namespace Basket\Form\Add;

use Basket\Command\AddProduct;

class Handler implements \Infrastructure\Form\Handler {

    /**
     * @param array $values
     * @return void
     */
    public function handle(array $values) {
        $quantity = $this->_getQuantity($values);
        $command = new AddProduct(
           $values['productId'],
           $quantity
        );


    }

    private function _getQuantity(array $values) {
        if (isset($values['quantity'])) {
            return $values['quantity'];
        } else {
            return 1;
        }
    }

} 