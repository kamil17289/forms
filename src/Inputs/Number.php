<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Number
 * @package Nethead\Forms\Inputs
 */
class Number extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'number';
    }
}