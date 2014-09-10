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
use Basket\Product\Factory\Simple as BasketProductFactory;
use Basket\Command\Result\AddProduct as CommandResult;

class AddProduct {
    /** @var  CustomerRepository */
    private $customerRepository;
    /** @var  ProductRepository */
    private $productRepository;
    /** @var  LocationService */
    private $basketLocationService;
    /** @var  BasketProductFactory */
    private $basketProductFactory;

    public function __construct(
        CustomerRepository $customerRepository,
        ProductRepository $productRepository,
        LocationService $service,
        BasketProductFactory $factory
    ) {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
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

            $product = $this->productRepository->getById($c->getProductId());

            $basketProduct = $this->basketProductFactory->createFromProduct($product);
            $basketProduct->setQuantity($c->getQuantity());

            $basket->addProduct($basketProduct);

            //

            return new CommandResult();
        } catch (\Exception $e) {
            return new CommandResult(array('Nie udało się :('));
        }
    }
} 