<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Input;

/**
 * Class Submit
 * @package Nethead\Forms\Controls
 */
class Submit extends Button {
    /**
     * @return Markup
     */
    protected function createHtml()
    {
        return new Markup([
            'button' => new Input('submit', $this->getName(), $this->text)
        ]);
    }
}