<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;

abstract class Renderer {
    /**
     * @var array
     */
    public static $options = [];

    /**
     * @param array $options
     * @param string|null $key
     * @return array
     */
    public static function options(array $options = [], string $key = null): array
    {
        if (empty($options)) {
            return static::$options;
        }

        if (is_null($key)) {
            return array_merge(static::$options, $options);
        }

        if (array_key_exists($key, $options)) {
            return array_merge(static::$options, $options[$key]);
        }

        return static::$options;
    }

    /**
     * @param array $options
     * @return void
     */
    public static function extend(array $options)
    {
        static::$options = array_merge_recursive(static::$options, $options);
    }

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return mixed
     */
    abstract public static function render(Fragment $fragment, Element $element = null, array $options = []);
}