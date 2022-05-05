<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Abstracts\Element;
use Nethead\Forms\Pipelines\Pipeline;
use Nethead\Forms\Renderers\Button as ButtonRenderer;

/**
 * Class Button
 * @package Nethead\Forms\Controls
 */
class Button extends Element {
    public static $pipeline = [
        ButtonRenderer::class,
    ];

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @var string
     */
    protected $type = 'button';

    /**
     * Button constructor.
     * @param string $name
     * @param string $text
     * @param string $type
     * @param string $id
     */
    public function __construct(string $name, string $text, string $type = 'button', string $id = '')
    {
        parent::__construct($name, $id);

        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function render(array $options = [])
    {
        return Pipeline::send($this, $options, static::$pipeline);
    }
}