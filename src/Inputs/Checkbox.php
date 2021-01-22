<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Checkbox
 * @package Nethead\Forms\Inputs
 */
class Checkbox extends Radio {
    /**
     * @return HtmlInput
     */
    protected function getInputElement(): HtmlInput
    {
        $input = parent::getInputElement();

        $input->attrs()->set('type', 'checkbox');

        return $input;
    }
}