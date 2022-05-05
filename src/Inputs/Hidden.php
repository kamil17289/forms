<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Input as InputRenderer;

/**
 * Class Hidden
 * @package Nethead\Forms\Inputs
 */
class Hidden extends Input {
    public static $pipeline = [
        InputRenderer::class,
    ];

    /**
     * Hidden constructor.
     * @param string $name
     * @param $value
     * @param string $id
     */
    public function __construct(string $name, $value, string $id = '')
    {
        parent::__construct($name, $value, $value, null, $id);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'hidden';
    }
}