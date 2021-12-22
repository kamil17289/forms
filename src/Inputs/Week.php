<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Week
 * @package Nethead\Forms\Inputs
 */
class Week extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'week';
    }
}