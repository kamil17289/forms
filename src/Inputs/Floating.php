<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Floating as FloatingRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Floating
 * @package Nethead\Forms\Inputs
 */
class Floating extends Number {
    public static $pipeline = [
        LabelRenderer::class,
        FloatingRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Floating constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);
    }
}