<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 16:30
 */

namespace Infrastructure\CommandResult;


trait ErrorManipulationTrait {

    protected $errors = [];

    public function hasErrors() {
        return count($this->errors) > 0;
    }

    public function getErrors() {
        return $this->errors;
    }

    protected function setErrors(array $errors) {
        $this->errors = $errors;
    }
} 