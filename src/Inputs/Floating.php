<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Tags\Input as HtmlInput;

/**
 * Class Integer
 * @package Nethead\Forms\Inputs
 */
class Floating extends Text {
    /**
     * @var int
     */
    protected $step = 0.1;

    /**
     * Integer constructor.
     * @param string $name
     * @param string $label
     * @param float|null $currentValue
     * @param float $step
     * @param float $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, float $currentValue = null, float $step = 0.1, float $defaultValue = 0)
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);

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
     * @return string
     */
    public function getInputType(): string
    {
        return 'number';
    }

    /**
     * @return HtmlInput
     */
    public function getInputElement(): HtmlInput
    {
        $input = parent::getInputElement();

        $input->step($this->step);

        return $input;
    }
}