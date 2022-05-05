<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Input as HtmlInput;

class Input extends Renderer {
    /**
     * @var array
     */
    public static $options = [];

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        $options = parent::options($options, 'input');

        $attrs = array_filter([
            'id' => $element->getId(),
            'form' => $element->getFormId(),
        ]);

        $input = new HtmlInput(
            $element->getInputType(),
            $element->getName(),
            $element->getValue(),
            array_merge($options, $attrs)
        );

        $fragment->push('input', $input);
    }
}