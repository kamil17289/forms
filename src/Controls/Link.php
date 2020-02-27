<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\A;

/**
 * Class Link
 * @package Nethead\Forms\Controls
 */
class Link extends Button {
    /**
     * @var string
     */
    protected $href;

    /**
     * Link constructor.
     * @param string $name
     * @param string $href
     * @param string $text
     * @throws \Exception
     */
    public function __construct(string $name, string $href, string $text)
    {
        parent::__construct($name, $text);

        $this->href = $href;
    }

    /**
     * @return Markup
     */
    protected function createHtml()
    {
        return new Markup([
            'button' => new A($this->href, $this->text)
        ]);
    }
}