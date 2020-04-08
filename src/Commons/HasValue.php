<?php

namespace Nethead\Forms\Commons;

/**
 * Trait HasValue
 * @package Nethead\Forms\Commons
 */
trait HasValue {
    /**
     * @var mixed
     */
    protected $currentValue = '';

    /**
     * @var mixed
     */
    protected $defaultValue = '';

    /**
     * @param $value
     */
    public function setValue($value)
    {
        if (is_null($value)) {
            $this->currentValue = $this->defaultValue;
        }
        else {
            $this->currentValue = $value;
        }

        if (method_exists($this, 'updateHtmlRepresentation')) {
            if ($this->getHtml() && $this->getHtml()->hasElement('input')) {
                $this->updateHtmlRepresentation('input', [
                    'value' => $value
                ]);
            }
        }
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->currentValue;
    }

    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @param string $defaultValue
     */
    public function setDefaultValue($defaultValue) : void
    {
        $this->defaultValue = $defaultValue;
    }
}