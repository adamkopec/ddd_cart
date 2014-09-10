<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 28.08.2014
 * Time: 16:28
 */

namespace Infrastructure;

interface CommandResult {

    /**
     * @return boolean
     */
    public function hasErrors();

    /**
     * @return array
     */
    public function getErrors();
} 