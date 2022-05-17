<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Renderers\BooleanCheckbox as BooleanCheckboxRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class BooleanCheckbox
 * @package Nethead\Forms\Inputs
 */
class BooleanCheckbox extends Checkbox {
    public static $pipeline = [
        LabelRenderer::class,
        BooleanCheckboxRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * BooleanCheckbox constructor.
     * @param string $name
     * @param int $currentValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $currentValue = 0, string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, 1, $label, $id);
    }
}