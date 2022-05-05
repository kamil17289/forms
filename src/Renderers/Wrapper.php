<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;

class Wrapper extends Renderer {
    /**
     * @var array
     */
    public static $options = [
        'tag' => 'div',
        'attrs' => [],
    ];

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return mixed|void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        $options = parent::options($options, 'wrapper');

        $fragment->wrap($options['tag'], $options['attrs']);
    }
}