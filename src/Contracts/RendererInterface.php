<?php

namespace Nethead\Forms\Contracts;

use Nethead\Forms\Abstracts\Element;

/**
 * Interface RendererInterface
 * @package Nethead\Forms\Contracts
 */
interface RendererInterface {
    /**
     * @param Element $element
     * @return string
     */
    public function render(Element $element): string;
}