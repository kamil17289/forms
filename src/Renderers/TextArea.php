<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Textarea as HtmlTextArea;

class TextArea extends Renderer {
    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return mixed|void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        $options = parent::options($options, 'input');

        $options['id'] = $element->getId();
        $options['form'] = $element->getFormId();

        $options = array_filter($options);

        $input = new HtmlTextArea(
            $element->getName(),
            $options,
            [$element->getValue()]
        );

        $fragment->push('input', $input);
    }
}