<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Search
 * @package Nethead\Forms\Inputs
 */
class Search extends Input {
    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'search';
    }
}