<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;

class File extends Input {
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

        $fragment->get('input')->attrs()
            ->remove('value');
    }
}