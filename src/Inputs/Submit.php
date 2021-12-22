<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Submit
 * @package Nethead\Forms\Inputs
 */
class Submit extends Button {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'submit';
    }
}