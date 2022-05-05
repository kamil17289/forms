<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\DataField;
use Nethead\Forms\Pipelines\Pipeline;
use Nethead\Forms\Renderers\TextArea as TextAreaRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class TextArea
 * @package Nethead\Forms\Inputs
 */
class TextArea extends DataField {
    public static $pipeline = [
        LabelRenderer::class,
        TextAreaRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @param array $options
     * @return mixed
     */
    public function render(array $options = [])
    {
        return Pipeline::send($this, $options, static::$pipeline);
    }
}