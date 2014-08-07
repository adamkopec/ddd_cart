<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 16:59
 */

namespace Infrastructure;

use Infrastructure\CommandDispatcher\DispatchResult;

interface CommandDispatcher {

    /**
     * @param object $command
     * @return DispatchResult
     */
    public function dispatch($command);
} 