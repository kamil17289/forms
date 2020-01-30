<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Button as HtmlButton;

/**
 * Class Reset
 * @package Nethead\Forms\Controls
 */
class Reset extends Button {
    /**
     * @return Markup|string
     */
    public function render()
    {
        return new Markup([
            'button' => new HtmlButton('reset', '', [], $this->text)
        ]);
    }
}