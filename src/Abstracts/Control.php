<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\IsMutable;
use Nethead\Forms\Contracts\Mutable;
use Nethead\Markup\Commons\RendersIcons;
use Nethead\Markup\Html\Tag;

/**
 * Class Control
 * @package Nethead\Forms\Abstracts
 */
abstract class Control extends Element implements Mutable {
    use RendersIcons, IsMutable;

    /**
     * Control constructor.
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->setHtml(static::createHtml());

        $this->mutate();
    }

    /**
     * @return Tag
     */
    public function getMutableElement() : Tag
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

    /**
     * @return mixed
     */
    abstract protected function createHtml();
}