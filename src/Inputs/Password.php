<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

class Password extends Text {
    /**
     * Password constructor.
     * @param string $name
     * @param string $label
     * @throws \Exception
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct($name, $label, '', '');
    }

    /**
     * @return HtmlInput
     */
    protected function getTextInput()
    {
        return new HtmlInput('password', $this->getName(), '', [
            'id' => $this->getID()
        ]);
    }
}