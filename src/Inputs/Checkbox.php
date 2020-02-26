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
        $input = parent::getInput();

        $input->setHtmlAttribute('type', 'checkbox');

        return $input;
    }
}