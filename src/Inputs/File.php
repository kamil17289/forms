<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\File as FileRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class File
 * @package Nethead\Forms\Inputs
 */
class File extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        FileRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * File constructor.
     * @param string $name
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, string $label = null, string $id = '')
    {
        parent::__construct($name, '', '', $label, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'file';
    }
}