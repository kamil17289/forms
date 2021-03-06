<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class Id
 * @package Nethead\Forms\Inputs
 */
class Id extends Integer {
    /**
     * @return HtmlInput
     */
    public function getInputElement()
    {
        $input = parent::getInputElement();

        $input->setHtmlAttribute('min', 1);
        $input->setHtmlAttribute('readonly', true);

        return $input;
    }
}