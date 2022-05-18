<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\DataField;
use Nethead\Forms\Pipelines\Pipeline;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\Select as SelectRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class Select
 * @package Nethead\Forms\Inputs
 */
class Select extends DataField {
    public static $pipeline = [
        LabelRenderer::class,
        SelectRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * Select constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     * @param string|null $label
     * @param array $options
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, array $options = [], string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);

        $this->setOptions($options);
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options = []): void
    {
        if (empty($options) && method_exists($this, 'getDefaultOptions')) {
            $this->options = $this->getDefaultOptions();
        }
        else {
            $this->options = $options;
        }
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Fragment
     */
    public function render(array $options = [])
    {
        return Pipeline::send($this, $options, static::$pipeline);
    }
}