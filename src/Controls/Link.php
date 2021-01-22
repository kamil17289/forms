<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Tags\A;

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
        $this->href = $href;

        parent::__construct($name, $text);
    }

    /**
     * @return Markup
     */
    protected function createHtml(): Markup
    {
        return new Markup([
            'button' => new A($this->href, [$this->text])
        ]);
    }
}