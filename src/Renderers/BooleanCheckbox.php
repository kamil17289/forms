<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Input as HtmlInput;

class BooleanCheckbox extends Checkbox {
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
        $fragment->push('hidden-false', new HtmlInput(
            'hidden',
            $element->getName(),
            0
        ));

        parent::render($fragment, $element, $options);
    }
}