<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Password
 * @package Nethead\Forms\Inputs
 */
class Password extends Input {
    /**
     * Password constructor.
     * @param string $name
     * @param string|null $label
     * @param string|null $forceValue
     * @param string $id
     */
    public function __construct(string $name, string $label = null, string $forceValue = null, string $id = '')
    {
        parent::__construct($name, '', '', $label, $id);

        $this->forceValue($forceValue);
    }

    /**
     * @param string|null $forceValue
     */
    public function forceValue(string $forceValue = null)
    {
        if (is_string($forceValue) && ! empty($forceValue)) {
            $this->setValue($forceValue);
        }
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'password';
    }
}