<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Input as InputRenderer;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Password
 * @package Nethead\Forms\Inputs
 */
class Password extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        InputRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Password constructor.
     * @param string $name
     * @param string|null $label
     * @param string|null $forceValue
     * @param string $id
     */
    public function __construct(string $name, string $label = null, string $forceValue = null, string $id = '')
    {
        parent::__construct($name, '', '', $label, $id);

        $this->forceValue($forceValue);
    }

    /**
     * @param string|null $forceValue
     */
    public function forceValue(string $forceValue = null)
    {
        if (is_string($forceValue) && ! empty($forceValue)) {
            $this->setValue($forceValue);
        }
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'password';
    }
}