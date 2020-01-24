<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Abstracts\Structure;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Html\Input as HtmlInput;

class BooleanCheckbox extends FormInput {
    public function __construct(string $name, string $label, bool $currentValue = null, bool $defaultValue = false)
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);
    }

    public function createHTML() : Structure
    {
        $label = $this->getLabel();

        $hidden = new HtmlInput('hidden', $this->getName(), 0);

        $input = new HtmlInput('checkbox', $this->getName(), 1, [
            'id' => $this->getID(),
        ]);

        if ($this->getValue() == 1) {
            $input->setHtmlAttribute('checked', true);
        }

        $structure = new FormGroup([
            $label,
            $hidden,
            $input,
        ]);

        if ($this->hasMessages()) {
            $messages = new Messages([

            ]);

            $structure->addElement($messages);
        }

        return $structure;
    }

    public function render()
    {
        return (string) $this->createHTML();
    }
}