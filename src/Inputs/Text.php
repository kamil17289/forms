<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Text as TextRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;

/**
 * Class Text
 * @package Nethead\Forms\Inputs
 */
class Text extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        TextRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'text';
    }
}