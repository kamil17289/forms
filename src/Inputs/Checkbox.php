<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Checkbox
 * @package Nethead\Forms\Inputs
 */
class Checkbox extends Input {
    /**
     * @var mixed|string
     */
    protected $selectedValue = '';

    /**
     * Checkbox constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $selectedValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $selectedValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $currentValue, $label, $id);

        $this->selectedValue = $selectedValue;
    }

    /**
     * @return mixed|string
     */
    public function getSelectedValue()
    {
        return $this->selectedValue;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'checkbox';
    }
}