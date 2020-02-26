<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Markup\Html\Input as HtmlInput;
use Nethead\Markup\Html\Label;

class BooleanToggle extends FormInput {
    /**
     * BooleanToggle constructor.
     * @param string $name
     * @param string $label
     * @param null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);

        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'input' => $this->getInput(),
            'toggle' => new Label($this->getID(), 'Toggle')
        ]));
    }

    /**
     * @return HtmlInput
     */
    protected function getInput()
    {
        return new HtmlInput('checkbox', $this->getName(), $this->getValue(), [
            'class' => 'toggle-switch'
        ]);
    }

    /**
     * @return string
     */
    public function render()
    {
        return (string) $this->getHtml();
    }
}