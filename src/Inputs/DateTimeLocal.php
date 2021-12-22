<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class DateTimeLocal
 * @package Nethead\Forms\Inputs
 */
class DateTimeLocal extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'datetime-local';
    }
}