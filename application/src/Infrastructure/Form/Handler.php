<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 10.07.2014
 * Time: 17:04
 */

namespace Infrastructure\Form;


interface Handler {
    /**
     * @param array $values
     * @return void
     */
    public function handle(array $values);
} 