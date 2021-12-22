<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Checkbox
 * @package Nethead\Forms\Inputs
 */
class Checkbox extends Radio {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'checkbox';
    }
}