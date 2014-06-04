<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.06.2014
 * Time: 01:27
 */

namespace Application\Product;

use ValueObjects\Enum\Enum;

class PriceType extends Enum {
    const SELLING = 'selling';
    const MINIMAL = 'minimal';
    const CATALOG = 'catalog';
} 