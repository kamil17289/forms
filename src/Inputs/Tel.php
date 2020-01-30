<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Color
 * @package Nethead\Forms\Inputs
 */
class Tel extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'tel';
    }
}