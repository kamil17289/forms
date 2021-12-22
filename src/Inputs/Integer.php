<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Integer
 * @package Nethead\Forms\Inputs
 */
class Integer extends Number {
    /**
     * @var int
     */
    protected $step = 1;

    /**
     * Integer constructor.
     * @param string $name
     * @param int|null $currentValue
     * @param int $defaultValue
     * @param string|null $label
     * @param int $step
     * @param string $id
     */
    public function __construct(string $name, int $currentValue = null, int $defaultValue = 0, string $label = null, int $step = 1, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);

        $this->step = $step;
    }

    /**
     * @param int $step
     */
    public function setStep(int $step)
    {
        $this->step = $step;
    }

    /**
     * @return int
     */
    public function getStep(): int
    {
        return $this->step;
    }
}