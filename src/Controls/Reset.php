<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Input;

/**
 * Class Reset
 * @package Nethead\Forms\Controls
 */
class Reset extends Button {
    /**
     * @return Markup
     */
    protected function createHtml()
    {
        return new Markup([
            'button' => new Input('reset', $this->getName(), $this->text)
        ]);
    }
}