<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Hidden
 * @package Nethead\Forms\Inputs
 */
class Hidden extends Input {
    /**
     * Hidden constructor.
     * @param string $name
     * @param $value
     * @param string $id
     */
    public function __construct(string $name, $value, string $id = '')
    {
        parent::__construct($name, $value, $value, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'hidden';
    }
}