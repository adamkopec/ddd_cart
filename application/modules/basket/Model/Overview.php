<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.09.14
 * Time: 22:02
 */

class Basket_Model_Overview implements Infrastructure\Model {
    /**
     * @var Basket\Repository
     */
    private $basketRepository;
    /**
     * @var Product\ReadStack\Repository
     */
    private $productRepository;

    /**
     * @var \Customer\Entities\Customer
     */
    private $customer;

    public function __construct(Basket\Repository $repository, Product\ReadStack\Repository $productRepository) {
        $this->basketRepository = $repository;
        $this->productRepository = $productRepository;

    }

    /**
     * @param \Customer\Entities\Customer $customer
     */
    public function setCustomer($customer) {
        $this->customer = $customer;
    }

    /**
     * @throws RuntimeException
     * @return array
     */
    public function getValues() {
        if (is_null($this->customer)) {
            throw new RuntimeException("There is no customer to fetch basket of");
        }

        $basket = $this->basketRepository->getByCustomerId($this->customer->getId());

        return array(
            'basket' => $basket,
            'products' => array_map(function (\Basket\Entities\Product $product) {
                return array(
                    'catalog_product' => $this->productRepository->getById($product->getId()),
                    'entity' => $product
                );
            }, $basket->getProducts())
        );
    }
} 