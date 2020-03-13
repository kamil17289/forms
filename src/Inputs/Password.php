<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

class Password extends Text {
    /**
     * Password constructor.
     * @param string $name
     * @param string $label
     * @throws \Exception
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct($name, $label, '', '');
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement()
    {
        $input = parent::getInputElement();

        $input->setHtmlAttribute('value', '');

        return $input;
    }

    /**
     * @return string
     */
    protected function getInputType(): string
    {
        return 'password';
    }

    /**
     * @param string $value
     */
    public function forceValue(string $value)
    {
        $this->setValue($value);
    }
}