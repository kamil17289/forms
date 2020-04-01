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
     * Submit constructor.
     * @param string $name
     * @param string $text
     * @throws \Exception
     */
    public function __construct(string $name, string $text)
    {
        parent::__construct($name, $text);
    }

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