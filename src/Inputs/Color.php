<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Color
 * @package Nethead\Forms\Inputs
 */
class Color extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'color';
    }
}