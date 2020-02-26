<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Textarea as HtmlTextArea;
use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Messages;

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

        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'input' => $this->getTextArea(),
            'messages' => new Messages($this->getAllMessages())
        ]));
    }

    /**
     * @return string
     */
    public function render()
    {
        return (string) $this->getHtml()->render();
    }

    /**
     * @return HtmlTextArea
     */
    protected function getTextArea()
    {
        return new HtmlTextArea($this->getName(), ['id' => $this->getID()], $this->getValue());
    }
}