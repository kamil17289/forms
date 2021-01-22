<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Text
 * @package Nethead\Forms\Inputs
 */
class Hidden extends FormInput {
    /**
     * Text constructor.
     * @param string $name
     * @param string|null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $currentValue = '', string $defaultValue = '')
    {
        $this->name = $name;
        $this->id = $this->generateID();
        $this->setDefaultValue($defaultValue);
        $this->setValue($currentValue);

        $this->setHtml(new Markup([
            'input' => $this->getInputElement(),
        ]));
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement(): HtmlInput
    {
        return new HtmlInput('hidden', $this->getName(), $this->getValue(), [
            'id' => $this->getID()
        ]);
    }
}