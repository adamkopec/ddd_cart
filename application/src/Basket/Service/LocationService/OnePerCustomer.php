<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 17:02
 */

namespace Basket\Service\LocationService;

use Basket\Entities\Basket;
use Basket\Exception\BasketNotFoundException;
use Basket\Repository;
use Basket\Service\LocationService;
use Basket\Factory as BasketFactory;
use Customer\Entities\Customer;

class OnePerCustomer implements LocationService {
    /** @var  Repository */
    private $basketRepository;
    /** @var BasketFactory */
    private $basketFactory;

    public function __construct(Repository $basketRepository, BasketFactory $basketFactory) {
        $this->basketRepository = $basketRepository;
        $this->basketFactory = $basketFactory;
    }

    /**
     * @param Customer $c
     * @return Basket
     */
    public function getByCustomer(Customer $c) {
        try {
            return $this->basketRepository->getByCustomerId($c->getId());
        } catch (BasketNotFoundException $e) {
            return $this->basketFactory->createBasket();
        }
    }
} 