<?php

namespace Nethead\Forms\Commons;

use Nethead\Markup\Html\Label;

/**
 * Trait HasLabel
 * @package Nethead\Forms\Commons
 */
trait HasLabel {
    /**
     * @var null
     */
    protected $label = null;

    /**
     * @param mixed $text
     * @param string $for
     * @param array $attributes
     * @param string $form
     */
    public function setLabel($text, string $for, array $attributes = [], $form = '')
    {
        $this->label = new Label($for, $text, $attributes, $form);
    }

    /**
     * @return null
     */
    public function getLabel()
    {
        return $this->label;
    }
}