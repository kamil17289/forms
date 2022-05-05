<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Input as InputRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class DateTimeLocal
 * @package Nethead\Forms\Inputs
 */
class DateTimeLocal extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        InputRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'datetime-local';
    }
}