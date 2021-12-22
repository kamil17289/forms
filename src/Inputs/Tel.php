<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Tel
 * @package Nethead\Forms\Inputs
 */
class Tel extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'tel';
    }
}