<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Markup\Commons\RendersIcons;

/**
 * Class Control
 * @package Nethead\Forms\Abstracts
 */
abstract class Control extends Element {
    use RendersIcons;

    /**
     * Control constructor.
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name);


    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->getHtml()->render();
    }

    abstract protected function getControlElement();
}