<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 16:35
 */

namespace Basket\Command\Result;

use Infrastructure\CommandResult as Result;
use Infrastructure\CommandResult\ErrorManipulationTrait as ErrorManipulation;

class AddProduct implements Result {
    use ErrorManipulation;

    public function __construct(array $errors = array()) {
        $this->setErrors($errors);
    }
} 