<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Search
 * @package Nethead\Forms\Inputs
 */
class Search extends Text {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'search';
    }
}