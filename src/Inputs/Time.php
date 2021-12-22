<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Time
 * @package Nethead\Forms\Inputs
 */
class Time extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'time';
    }
}