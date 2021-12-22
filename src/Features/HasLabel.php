<?php

namespace Nethead\Forms\Features;

/**
 * Trait HasLabel
 * Adds a ability to hold data label
 * @package Nethead\Forms\Features
 */
trait HasLabel {
    /**
     * @var string|null
     */
    protected $label = null;

    /**
     * @param string|null $text
     */
    public function setLabel(string $text = null): void
    {
        $this->label = $text;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
}