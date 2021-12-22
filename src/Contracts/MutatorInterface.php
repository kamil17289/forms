<?php

namespace Nethead\Forms\Contracts;

use Nethead\Markup\Foundation\Fragment;
use Nethead\Forms\Abstracts\Element;

/**
 * Interface MutatorInterface
 * @package Nethead\Forms\Contracts
 */
interface MutatorInterface {
    /**
     * @param Element $element
     * @param Fragment $fragment
     * @return mixed
     */
    public function __invoke(Element $element, Fragment $fragment);
}