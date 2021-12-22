<?php

namespace Nethead\Forms\Inputs;

/**
 * Class Floating
 * @package Nethead\Forms\Inputs
 */
class Floating extends Number {
    /**
     * @var float
     */
    protected $step = 0.1;

    /**
     * Floating constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     * @param string|null $label
     * @param float $step
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, float $step = 0.1, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);

        $this->step = $step;
    }

    /**
     * @param float $step
     */
    public function setStep(float $step)
    {
        $this->step = $step;
    }

    /**
     * @return float
     */
    public function getStep(): float
    {
        return $this->step;
    }
}