<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class Checkbox
 * @package Nethead\Forms\Inputs
 */
class Checkbox extends Radio {
    /**
     * @return HtmlInput
     */
    protected function getInput()
    {
        $input = new HtmlInput('checkbox', $this->getName(), $this->getDefaultValue(), [
            'id' => $this->getID()
        ]);

        if ($this->getValue() == $this->selected) {
            $input->setHtmlAttribute('checked', true);
        }

        return $input;
    }
}