<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class Radio
 * @package Nethead\Forms\Inputs
 */
class Radio extends FormInput {
    /**
     * @var string
     */
    protected $selected = '';

    /**
     * Radio constructor.
     * @param string $name
     * @param string $label
     * @param null $value
     * @param string $selected
     * @throws \Exception
     */
    public function __construct(string $name, string $label, $value = null, $selected = '')
    {
        parent::__construct($name, $label, $value, $value);

        $this->selected = $selected;

        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'input' => $this->getInput(),
            'messages' => new Messages($this->getAllMessages())
        ]));
    }

    /**
     * @return HtmlInput
     */
    protected function getInput()
    {
        $input = new HtmlInput('radio', $this->getName(), $this->getDefaultValue(), [
            'id' => $this->getID()
        ]);

        if ($this->getValue() == $this->selected) {
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
        return (string) $this->getHtml()->render();
    }
}