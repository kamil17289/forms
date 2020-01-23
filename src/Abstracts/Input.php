<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasLabel;
use Nethead\Forms\Commons\HasValue;
use Nethead\Forms\Commons\ShowsMessages;
use Nethead\Markup\Commons\RendersIcons;

/**
 * Class Input
 * @package Nethead\Forms\Abstracts
 */
abstract class Input extends Element {
    use HasValue, RendersIcons, ShowsMessages, HasLabel;

    /**
     * Input constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name);

        $this->defaultValue = $defaultValue;

        $this->setValue($currentValue);
    }

    /**
     * @return string
     */
    abstract public function render();
}