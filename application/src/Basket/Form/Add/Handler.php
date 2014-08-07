<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 17:03
 */

namespace Basket\Form\Add;

use Basket\Command\AddProduct;
use Rhumsaa\Uuid\Uuid;
use Customer\Repository;
use Infrastructure\CommandDispatcher;

class Handler implements \Infrastructure\Form\Handler {

    /** @var  Repository */
    protected $customerRepository;
    /** @var  CommandDispatcher */
    protected $commandDispatcher;

    public function __construct(Repository $customerRepository) {
        $this->customerRepository = $customerRepository;
    }


    /**
     * @param array $values
     * @return void
     */
    public function handle(array $values) {
        $quantity = $this->_getQuantity($values);
        $currentCustomer = $this->customerRepository->getCurrentCustomer();
        $command = new AddProduct(
           $currentCustomer->getId(),
           Uuid::fromString($values['productId']),
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