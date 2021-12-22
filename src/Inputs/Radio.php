<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Radio
 * @package Nethead\Forms\Inputs
 */
class Radio extends Input {
    /**
     * @var mixed|string
     */
    protected $selectedValue = '';

    /**
     * Radio constructor.
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
        return 'radio';
    }
}