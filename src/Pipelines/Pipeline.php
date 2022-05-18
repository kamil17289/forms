<?php

namespace Nethead\Forms\Pipelines;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;

/**
 *
 */
class Pipeline {
    /**
     * @var array
     */
    public static $pipes = [];

    /**
     * @param Element $element
     * @param array $options
     * @param array $pipes
     * @return Fragment
     */
    public static function send(Element $element, array $options = [], array $pipes = []): Fragment
    {
        $fragment = new Fragment();

        if (empty($pipes)) {
            $pipes = static::$pipes;
        }

        foreach($pipes as $pipe) {
            if (is_callable([$pipe, 'render'])) {
                call_user_func([$pipe, 'render'], $fragment, $element, $options);
            }
        }

        return $fragment;
    }
}