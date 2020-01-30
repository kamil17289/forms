<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Date
 * @package Nethead\Forms\Inputs
 */
class Date extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'date';
    }
}