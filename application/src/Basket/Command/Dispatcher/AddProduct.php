<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 16:17
 */

namespace Basket\Command\Dispatcher;

use Basket\Command\AddProduct as Command;
use Customer\Repository as CustomerRepository;
use Basket\Service\LocationService;
use Basket\Product\Factory\Simple as ProductFactory;
use Basket\Command\Result\AddProduct as CommandResult;

class AddProduct {
    /** @var  CustomerRepository */
    private $customerRepository;
    /** @var  LocationService */
    private $basketLocationService;
    /** @var  ProductFactory */
    private $basketProductFactory;

    public function __construct(CustomerRepository $repository, LocationService $service, ProductFactory $factory) {
        $this->customerRepository = $repository;
        $this->basketLocationService = $service;
        $this->basketProductFactory = $factory;
    }

    /**
     * @param \Basket\Command\AddProduct $c
     * @return CommandResult
     */
    public function dispatch(Command $c) {
        try {
            $customer = $this->customerRepository->getById($c->getCustomerId());
            $basket = $this->basketLocationService->getByCustomer($customer);

            $basketProduct = $this->basketProductFactory->createFromProduct($c->getProductId());
            $basketProduct->setQuantity($c->getQuantity());

            $basket->addProduct($basketProduct);

            return new CommandResult();
        } catch (\Exception $e) {
            return new CommandResult(array('Nie udało się :('));
        }
    }
} 