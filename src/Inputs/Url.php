<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Url
 * @package Nethead\Forms\Inputs
 */
class Url extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'url';
    }
}