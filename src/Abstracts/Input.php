<?php

namespace Nethead\Forms\Abstracts;

/**
 * Class Input
 * A specific DataField which supports <input> elements.
 * @package Nethead\Forms\Abstracts
 */
abstract class Input extends DataField {
    /**
     * This method must be implemented by extending classes for proper
     * rendering of the HTML element. Basically it returns is a HTML type="" attribute value.
     * @return string
     */
    abstract public function getInputType(): string;

    /**
     * Input constructor.
     * @inheritDoc
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);
    }
}