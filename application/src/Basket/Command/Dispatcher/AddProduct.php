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
use Product\UpdateStack\Repository as ProductRepository;
use Basket\Service\LocationService;
use Basket\Service\Adder as AddingService;
use Basket\Command\Result\AddProduct as CommandResult;

class AddProduct {
    /** @var  CustomerRepository */
    private $customerRepository;
    /** @var  ProductRepository */
    private $productRepository;
    /** @var  LocationService */
    private $basketLocationService;
    /** @var  AddingService */
    private $basketAddingService;

    public function __construct(
        CustomerRepository $customerRepository,
        ProductRepository $productRepository,
        LocationService $service,
        AddingService $addingService
    ) {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->basketLocationService = $service;
        $this->basketAddingService = $addingService;
    }

    /**
     * @param \Basket\Command\AddProduct $c
     * @return CommandResult
     */
    public function dispatch(Command $c) {
        try {
            $customer = $this->customerRepository->getById($c->getCustomerId());
            $basket = $this->basketLocationService->getByCustomer($customer);

            $product = $this->productRepository->getById($c->getProductId());

            $this->basketAddingService->add($product, $basket, $c->getQuantity());

            return new CommandResult();
        } catch (\Exception $e) {
            return new CommandResult(array('Nie udało się :('));
        }
    }
} 