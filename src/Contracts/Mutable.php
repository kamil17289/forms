<?php

namespace Nethead\Forms\Contracts;

use Nethead\Markup\Html\Tag;

/**
 * Interface Mutable
 * @package Nethead\Forms\Contracts
 */
interface Mutable {
    /**
     * @return mixed
     */
    public function mutate();

    /**
     * @param callable $mutator
     * @return mixed
     */
    public static function setMutator(callable $mutator);

    /**
     * @return Tag
     */
    public function getMutableElement() : Tag;
}