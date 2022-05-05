<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Input as InputRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Button
 * @package Nethead\Forms\Inputs
 */
class Button extends Input {
    public static $pipeline = [
        InputRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * Button constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $currentValue, null, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'button';
    }
}