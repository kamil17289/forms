<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\IsMutable;
use Nethead\Markup\Commons\RendersIcons;

/**
 * Class Control
 * @package Nethead\Forms\Abstracts
 */
abstract class Control extends Element {
    use RendersIcons, IsMutable;

    /**
     * Control constructor.
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function getMutableElement()
    {
        return $this->getHtml()
            ->getElement('button');
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->getHtml()->render();
    }
}