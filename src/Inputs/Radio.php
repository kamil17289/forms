<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Radio
 * @package Nethead\Forms\Inputs
 */
class Radio extends FormInput {
    /**
     * @var string
     */
    protected $selected = '';

    /**
     * Radio constructor.
     * @param string $name
     * @param string $label
     * @param null $value
     * @param string $selected
     * @throws \Exception
     */
    public function __construct(string $name, string $label, $value = null, $selected = '')
    {
        parent::__construct($name, $label, $value, $value);

        $this->selected = $selected;
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement(): HtmlInput
    {
        $input = new HtmlInput('radio', $this->getName(), $this->getDefaultValue(), [
            'id' => $this->getID()
        ]);

        if ($this->getValue() == $this->selected) {
            $input->checked();
        }

        return $input;
    }
}