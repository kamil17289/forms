<?php

namespace Nethead\Forms\Features;

/**
 * Trait HoldsValue
 * Adds ability to hold (name, value) entity.
 * @package Nethead\Forms\Features
 */
trait HoldsValue {
    /**
     * @var mixed
     */
    protected $currentValue = '';

    /**
     * @var mixed
     */
    protected $defaultValue = '';

    /**
     * Set the value for the element. If null is provided, the default value will be used.
     * @param $value
     */
    public function setValue($value): void
    {
        $this->currentValue = is_null($value) ? $this->defaultValue : $value;
    }

    /**
     * Get the value of the element.
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->currentValue;
    }

    /**
     * Set the default value to use, if the value is not set.
     * @param $value
     */
    public function setDefaultValue($value): void
    {
        $this->defaultValue = $value;
    }

    /**
     * Get the default value of the element.
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}