<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Month
 * @package Nethead\Forms\Inputs
 */
class Month extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'month';
    }
}