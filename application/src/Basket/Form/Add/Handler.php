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
use Infrastructure\CommandResult;

class Handler implements \Infrastructure\Form\Handler {

    /** @var  Repository */
    protected $customerRepository;
    /** @var  CommandDispatcher */
    protected $commandDispatcher;

    public function __construct(Repository $customerRepository, CommandDispatcher $dispatcher) {
        $this->customerRepository = $customerRepository;
        $this->commandDispatcher = $dispatcher;
    }


    /**
     * @param array $values
     * @return CommandResult
     */
    public function handle(array $values) {
        $quantity = $this->_getQuantity($values);
        $currentCustomer = $this->customerRepository->getCurrent();
        $command = new AddProduct(
           $currentCustomer->getId(),
           Uuid::fromString($values['productId']),
           $quantity
        );

        return $this->commandDispatcher->dispatch($command);
    }

    private function _getQuantity(array $values) {
        if (isset($values['quantity'])) {
            return $values['quantity'];
        } else {
            return 1;
        }
    }

} 