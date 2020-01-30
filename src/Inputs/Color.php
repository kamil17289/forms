<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Color
 * @package Nethead\Forms\Inputs
 */
class Color extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'color';
    }
}