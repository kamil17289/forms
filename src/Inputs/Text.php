<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Text
 * @package Nethead\Forms\Inputs
 */
class Text extends FormInput {
    /**
     * Text constructor.
     * @param string $name
     * @param string $label
     * @param string|null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, string $currentValue = '', string $defaultValue = '')
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);
    }

    /**
     * @return string
     */
    protected function getInputType() : string
    {
        return 'text';
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement(): HtmlInput
    {
        return new HtmlInput($this->getInputType(), $this->getName(), $this->getValue(), [
            'id' => $this->getID()
        ]);
    }
}