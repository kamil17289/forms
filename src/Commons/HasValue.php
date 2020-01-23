<?php

namespace Nethead\Forms\Commons;

/**
 * Trait HasValue
 * @package Nethead\Forms\Commons
 */
trait HasValue {
    /**
     * @var string
     */
    protected $currentValue = '';

    /**
     * @var string
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
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->currentValue;
    }
}