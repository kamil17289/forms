<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Email
 * @package Nethead\Forms\Inputs
 */
class Email extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'email';
    }
}