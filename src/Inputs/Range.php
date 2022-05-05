<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Range as RangeRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Range
 * @package Nethead\Forms\Inputs
 */
class Range extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        RangeRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Range constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     * @param string|null $label
     * @param int $min
     * @param int $max
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'range';
    }
}