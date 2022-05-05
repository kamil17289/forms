<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Button as HtmlButton;
use Nethead\Forms\Controls\Button as ButtonField;

class Button extends Renderer {
    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        if ($element instanceof ButtonField) {
            $options = parent::options($options, 'button');

            $attrs = [
                'id' => $element->getId(),
                'form' => $element->getFormId(),
                'name' => $element->getName()
            ];

            $fragment->push('button', new HtmlButton(
                $element->getType(),
                '',
                array_merge($options, $attrs),
                [$element->getText()]
            ));
        }
    }
}