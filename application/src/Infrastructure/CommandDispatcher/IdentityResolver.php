<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 16:45
 */

namespace Infrastructure\CommandDispatcher;

use Infrastructure\IdentityResolver as ResolverInterface;

class IdentityResolver implements ResolverInterface {

    const METHOD_NAME = 'dispatch';

    public function resolveType($object) {
        if (!is_object($object)) {
            throw new \InvalidArgumentException("Unable to resolve type of a non-object");
        }

        if (!method_exists($object, self::METHOD_NAME)) {
            throw new \InvalidArgumentException("Object does not implement dispatch(\$command)");
        }

        $method = new \ReflectionMethod($object, self::METHOD_NAME);
        if (!$method->isPublic()) {
            throw new \InvalidArgumentException("dispatch(\$command) must be public");
        }

        if ($method->getNumberOfRequiredParameters() != 1) {
            throw new \InvalidArgumentException("dispatch(\$command) must accept exactly one argument");
        }

        $parameter = $method->getParameters()[0];
        $typeHint = $parameter->getClass();
        if (is_null($typeHint)) {
            throw new \InvalidArgumentException("First argument of dispatch(\$command) must be an object");
        }

        return $typeHint->getName();
    }

} 