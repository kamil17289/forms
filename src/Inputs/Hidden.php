<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Input as HtmlInput;
use Nethead\Forms\Helpers\Str;

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
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        $this->setHtml(new Markup([
            'input' => $this->getHiddenInput(),
        ]));

        return (string) $this->getHtml()->render();
    }

    /**
     * @return HtmlInput
     */
    protected function getHiddenInput()
    {
        return new HtmlInput('hidden', $this->getName(), $this->getValue(), [
            'id' => $this->getID()
        ]);
    }
}