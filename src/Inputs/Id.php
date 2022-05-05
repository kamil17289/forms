<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Id as IdRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Id
 * @package Nethead\Forms\Inputs
 */
class Id extends Integer {
    public static $pipeline = [
        LabelRenderer::class,
        IdRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Id constructor.
     * @param string $name
     * @param int|null $currentValue
     * @param int $defaultValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, int $currentValue = null, int $defaultValue = 1, string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);
    }
}