<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Abstracts\Control;
use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Button as HtmlButton;

/**
 * Class Button
 * @package Nethead\Forms\Controls
 */
class Button extends Control {
    /**
     * @var string
     */
    protected $text;

    /**
     * Button constructor.
     * @param string $name
     * @param string $text
     * @throws \Exception
     */
    public function __construct(string $name, string $text)
    {
        $this->text = $text;

        parent::__construct($name);
    }

    /**
     * @return Markup
     */
    protected function createHtml()
    {
        return new Markup([
            'button' => new HtmlButton('button', '', [], $this->text)
        ]);
    }
}