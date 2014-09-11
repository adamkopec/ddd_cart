<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 11.09.2014
 * Time: 16:30
 */

namespace Basket\Service\Adder;

use Basket\Entities\Basket;
use Basket\Service\Adder;
use Product\Entities\Product;
use Basket\Product\Factory;
use Basket\Repository;

class Persistent implements Adder {

    /** @var  Factory */
    private $basketProductFactory;
    /** @var  Repository */
    private $basketRepository;

    /**
     * @param Factory $basketProductFactory
     * @param Repository $basketRepository
     */
    public function __construct(Factory $basketProductFactory, Repository $basketRepository) {
        $this->basketProductFactory = $basketProductFactory;
        $this->basketRepository = $basketRepository;
    }

    /**
     * @param Product $product
     * @param Basket $basket
     * @param int $quantity
     * @return void
     */
    public function add(Product $product, Basket $basket, $quantity) {
        $basketProduct = $this->basketProductFactory->createFromProduct($product);
        $basketProduct->setQuantity($quantity);

        $basket->addProduct($basketProduct);

        $this->basketRepository->persist($basket);
    }
} 