<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Input as NumberRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Number
 * @package Nethead\Forms\Inputs
 */
class Number extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        NumberRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'number';
    }
}