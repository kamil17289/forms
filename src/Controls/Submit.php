<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Button as HtmlButton;

/**
 * Class Submit
 * @package Nethead\Forms\Controls
 */
class Submit extends Button {
    /**
     * @return Markup|string
     */
    public function render()
    {
        return new Markup([
            'button' => new HtmlButton('submit', '', [], $this->text)
        ]);
    }
}