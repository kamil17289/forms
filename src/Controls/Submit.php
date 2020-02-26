<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Button as HtmlButton;

/**
 * Class Submit
 * @package Nethead\Forms\Controls
 */
class Submit extends Button {
    public function __construct(string $name, string $text)
    {
        parent::__construct($name, $text);

        $this->getHtml()
            ->getElement('button')
            ->setHtmlAttribute('type', 'submit');
    }
}