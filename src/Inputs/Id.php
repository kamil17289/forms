<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Id
 * @package Nethead\Forms\Inputs
 */
class Id extends Integer {
    /**
     * @return HtmlInput
     */
    public function getInputElement(): HtmlInput
    {
        $input = parent::getInputElement();

        $input->min(1)->readonly(true);

        return $input;
    }
}