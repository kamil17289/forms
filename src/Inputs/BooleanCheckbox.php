<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Tags\Input as HtmlInput;

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

        $this->getHtml()
            ->addElement('input-false', new HtmlInput('hidden', $this->getName(), 0));
    }

    /**
     * @return HtmlInput
     * @throws \Exception
     */
    protected function getInputElement(): HtmlInput
    {
        $input = new HtmlInput('checkbox', $this->getName(), 1, [
            'id' => $this->getID(),
        ]);

        // don't use === here as the boolean value must be changed to integer
        if ($this->getValue() == 1) {
            $input->checked();
        }

        return $input;
    }
}