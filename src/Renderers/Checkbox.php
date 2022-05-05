<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Forms\Inputs\Checkbox as CheckboxField;

class Checkbox extends Input {
    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        parent::render($fragment, $element, $options);

        if ($element instanceof CheckboxField) {
            $fragment->get('input')->attrs()
                ->set('checked', $element->getValue() == $element->getSelectedValue());
        }
    }
}