<?php

namespace Nethead\Forms\Commons;

use Nethead\Markup\Tags\Form;
use Nethead\Markup\Tags\Label;

/**
 * Trait HasLabel
 * @package Nethead\Forms\Commons
 */
trait HasLabel {
    /**
     * @var Label|null
     */
    protected $label = null;

    /**
     * @param mixed $text
     * @param string $for
     * @param array $attributes
     * @param Form|null $form
     */
    public function setLabel($text, string $for, array $attributes = [], Form $form = null)
    {
        $this->label = new Label($for, $text, $attributes);

        if ($form) {
            $this->label->bindForm($form);
        }
    }

    /**
     * @return Label|null
     */
    public function getLabel(): ?Label
    {
        return $this->label;
    }
}