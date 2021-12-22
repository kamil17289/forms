<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class File
 * @package Nethead\Forms\Inputs
 */
class File extends Input {
    /**
     * File constructor.
     * @param string $name
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, string $label = null, string $id = '')
    {
        parent::__construct($name, '', '', $label, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'file';
    }
}