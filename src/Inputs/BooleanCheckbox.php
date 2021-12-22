<?php

namespace Nethead\Forms\Inputs;

/**
 * Class BooleanCheckbox
 * @package Nethead\Forms\Inputs
 */
class BooleanCheckbox extends Checkbox {
    /**
     * BooleanCheckbox constructor.
     * @param string $name
     * @param string $selectedValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $selectedValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, 1, $selectedValue, $label, $id);
    }
}