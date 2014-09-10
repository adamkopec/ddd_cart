<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 17:04
 */

namespace Infrastructure\Form;

use Infrastructure\CommandResult;

interface Handler {
    /**
     * @param array $values
     * @return CommandResult
     */
    public function handle(array $values);
} 