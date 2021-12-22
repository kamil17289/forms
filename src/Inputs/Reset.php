<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Reset
 * @package Nethead\Forms\Inputs
 */
class Reset extends Button {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'reset';
    }
}