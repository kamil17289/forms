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
     * @param int $selectedValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $selectedValue = 0, string $label = null, string $id = '')
    {
        parent::__construct($name, 1, $selectedValue, $label, $id);
    }

    /**
     * As this is a Boolean checkbox, it's value must always be 1.
     * hidden-false element will ensure that value is always send.
     * @param $value
     * @return void
     */
    public function setValue($value): void
    {
        $this->currentValue = 1;
    }
}