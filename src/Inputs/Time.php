<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Time
 * @package Nethead\Forms\Inputs
 */
class Time extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'time';
    }
}