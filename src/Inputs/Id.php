<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Id
 * @package Nethead\Forms\Inputs
 */
class Id extends Integer {
    /**
     * Id constructor.
     * @param string $name
     * @param int|null $currentValue
     * @param int $defaultValue
     * @param string|null $label
     * @param int $step
     * @param string $id
     */
    public function __construct(string $name, int $currentValue = null, int $defaultValue = 1, string $label = null, int $step = 1, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $step, $id);
    }
}