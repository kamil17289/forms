<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Button
 * @package Nethead\Forms\Inputs
 */
class Button extends Input {
    /**
     * Button constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $currentValue, null, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'button';
    }
}