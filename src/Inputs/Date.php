<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Date
 * @package Nethead\Forms\Inputs
 */
class Date extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'date';
    }
}