<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

class Email extends Text {
    /**
     * @return HtmlInput
     */
    protected function getTextInput()
    {
        return new HtmlInput('email', $this->getName(), $this->getValue(), [
            'id' => $this->getID()
        ]);
    }
}