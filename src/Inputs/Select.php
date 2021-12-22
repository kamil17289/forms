<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\DataField;

/**
 * Class Select
 * @package Nethead\Forms\Inputs
 */
class Select extends DataField {
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

        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}