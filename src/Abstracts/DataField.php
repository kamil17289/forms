<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Features\HasMessages;
use Nethead\Forms\Features\HoldsValue;
use Nethead\Forms\Features\HasLabel;

/**
 * Class DataField
 * Basic Element which can hold and store (name,value) entity.
 * DataFields are also able to store a user friendly data name (label), and messages.
 * @package Nethead\Forms\Abstracts
 */
abstract class DataField extends Element {
    use HoldsValue, HasLabel, HasMessages;

    /**
     * DataField constructor.
     * @inheritDoc
     * @param null $currentValue
     *  Value of the data.
     * @param mixed $defaultValue
     *  Default value will be used every time the $currentValue can't be populated (is null).
     * @param string|null $label
     *  Human readable data label.
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, string $id = '')
    {
        parent::__construct($name, $id);

        $this->setDefaultValue($defaultValue);
        $this->setValue($currentValue);

        $this->setLabel($label);
    }
}