<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Html\Input as HtmlInput;
use Nethead\Forms\Structures\Messages;
use Nethead\Forms\Structures\FormGroup;

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
     * @throws \Exception
     */
    public function render()
    {
        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'input' => $this->getTextInput(),
            'messages' => new Messages($this->getAllMessages())
        ]));

        return (string) $this->getHtml()->render();
    }

    /**
     * @return HtmlInput
     */
    protected function getTextInput()
    {
        return new HtmlInput('text', $this->getName(), $this->getValue(), [
            'id' => $this->getID()
        ]);
    }
}