<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Textarea as HtmlTextArea;
use Nethead\Forms\Abstracts\Input as FormInput;

/**
 * Class TextArea
 * @package Nethead\Forms\Inputs
 */
class TextArea extends FormInput {
    /**
     * TextArea constructor.
     * @param string $name
     * @param string $label
     * @param string $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, string $currentValue = '', string $defaultValue = '')
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);
    }

    /**
     * @return HtmlTextArea
     */
    protected function getInputElement()
    {
        return new HtmlTextArea($this->getName(), ['id' => $this->getID()], $this->getValue());
    }
}