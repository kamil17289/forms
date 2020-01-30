<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Week
 * @package Nethead\Forms\Inputs
 */
class Week extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'week';
    }
}