<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Renderers\Label as LabelRenderer;
use Nethead\Forms\Renderers\Messages as MessagesRenderer;
use Nethead\Forms\Renderers\DataList as DataListRenderer;
use Nethead\Forms\Renderers\Wrapper as WrapperRenderer;

/**
 * Class DataList
 * @package Nethead\Forms\Inputs
 */
class DataList extends Input {
    public static $pipeline = [
        LabelRenderer::class,
        DataListRenderer::class,
        MessagesRenderer::class,
        WrapperRenderer::class,
    ];

    /**
     * @var string
     */
    protected $listId = '';

    /**
     * @var array
     */
    protected $options = [];

    /**
     * DataList constructor.
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

        $this->options = $options;

        $this->listId = $this->getId() . '_list';
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'text';
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getListId(): string
    {
        return $this->listId;
    }
}