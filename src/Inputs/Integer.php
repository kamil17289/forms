<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Renderers\Integer as IntegerRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Integer
 * @package Nethead\Forms\Inputs
 */
class Integer extends Number {
    public static $pipeline = [
        LabelRenderer::class,
        IntegerRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Integer constructor.
     * @param string $name
     * @param int|null $currentValue
     * @param int $defaultValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, int $currentValue = null, int $defaultValue = 0, string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);
    }
}