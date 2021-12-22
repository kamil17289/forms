<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Month
 * @package Nethead\Forms\Inputs
 */
class Month extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'month';
    }
}