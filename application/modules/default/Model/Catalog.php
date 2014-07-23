<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 23.07.2014
 * Time: 22:31
 */

class Default_Model_Catalog implements Infrastructure\Model {
    /**
     * @var Product\ReadStack\Repository
     */
    private $repository;
    /**
     * @var Basket\Form\Add\Builder
     */
    private $formBuilder;

    public function __construct(Product\ReadStack\Repository $repository, Basket\Form\Add\Builder $formBuilder) {
        $this->repository = $repository;
        $this->formBuilder = $formBuilder;
    }

    /**
     * @return array
     */
    public function getValues() {
        $products = $this->repository->getAll();
        $forms = $this->_getForms($products);

        return array(
            'products' => $products,
            'productForms' => $forms
        );
    }

    /**
     * @param Product\ProductData[] $products
     * @return Zend_Form[]
     */
    private function _getForms($products) {
        $forms = [];
        foreach ($products as $product) {
            $productId = $product->getId();
            $forms[$productId] = $this->formBuilder->setProductId($productId)
                ->getForm();
        }
        return $forms;
    }

} 