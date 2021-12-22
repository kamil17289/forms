<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Url
 * @package Nethead\Forms\Inputs
 */
class Url extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'url';
    }
}