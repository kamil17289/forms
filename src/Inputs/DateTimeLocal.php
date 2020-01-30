<?php

namespace Nethead\Forms\Inputs;

/**
 * Class DateTimeLocal
 * @package Nethead\Forms\Inputs
 */
class DateTimeLocal extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'datetime-local';
    }
}