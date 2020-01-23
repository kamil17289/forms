<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

class BooleanCheckbox extends Input {
    public function __construct(string $name, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name, $currentValue, $defaultValue);
    }

    public function render()
    {

    }
}