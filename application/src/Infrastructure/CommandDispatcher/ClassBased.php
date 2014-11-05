<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 31.07.2014
 * Time: 17:01
 */

namespace Infrastructure\CommandDispatcher;

use Infrastructure\CommandDispatcher;
use Infrastructure\IdentityMap;

class ClassBased implements CommandDispatcher {

    /** @var  IdentityMap */
    private $dispatchers;

    public function __construct(IdentityMap $dispatchers) {
        $this->dispatchers = $dispatchers;
    }

    /**
     * @param object $command
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @return DispatchResult
     */
    public function dispatch($command) {
        if (!is_object($command)) {
            throw new \RuntimeException("Command is not an object");
        }

        if ($this->dispatchers->hasIdentity($command)) {
            $dispatcher = $this->dispatchers->getIdentity($command);
            return $dispatcher->dispatch($command);
        } else {
            throw new \InvalidArgumentException("Command cannot be dispatched, no specific dispatcher registered.");
        }
    }
} 