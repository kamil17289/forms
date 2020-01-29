<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class BooleanCheckbox
 * @package Nethead\Forms\Inputs
 */
class BooleanCheckbox extends FormInput {
    /**
     * BooleanCheckbox constructor.
     * @param string $name
     * @param string $label
     * @param bool|null $currentValue
     * @param bool $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, bool $currentValue = null, bool $defaultValue = false)
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);
    }

    /**
     * @return HtmlInput
     */
    protected function getBooleanFalseInput()
    {
        return new HtmlInput('hidden', $this->getName(), 0);
    }

    /**
     * @return HtmlInput
     * @throws \Exception
     */
    protected function getBooleanTrueInput()
    {
        $input = new HtmlInput('checkbox', $this->getName(), 1, [
            'id' => $this->getID(),
        ]);

        // don't use === here as the boolean value must be changed to integer
        if ($this->getValue() == 1) {
            $input->setHtmlAttribute('checked', true);
        }

        return $input;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'boolean-false' => $this->getBooleanFalseInput(),
            'boolean-true' => $this->getBooleanTrueInput(),
            'messages' => new Messages($this->getAllMessages())
        ]));

        return (string) $this->getHtml()->render();
    }
}