<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Label as HtmlLabel;

class Label extends Renderer {
    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        $options = parent::options($options, 'label');

        $label = new HtmlLabel($element->getId(), $element->getLabel(), $options);

        $fragment->push('label', $label);
    }
}