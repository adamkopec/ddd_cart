<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 07.08.2014
 * Time: 16:42
 */

namespace Infrastructure;


interface IdentityResolver {
    public function resolveType($object);
} 