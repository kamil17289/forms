<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Forms\Inputs\Radio as RadioField;

class Radio extends Input {
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
        parent::render($fragment, $element, $options);

        if ($element instanceof RadioField) {
            $fragment->get('input')->attrs()
                ->set('checked', $element->getValue() == $element->getSelectedValue())
                ->set('name', $element->getRealName());
        }
    }
}