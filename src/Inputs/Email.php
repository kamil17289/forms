<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Email
 * @package Nethead\Forms\Inputs
 */
class Email extends Text {
    /**
     * @return string
     */
    protected function getInputType(): string
    {
        return 'email';
    }
}