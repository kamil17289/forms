<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class Integer
 * @package Nethead\Forms\Inputs
 */
class Integer extends Text {
    /**
     * @var int
     */
    protected $step = 1;

    /**
     * Integer constructor.
     * @param string $name
     * @param string $label
     * @param int|null $currentValue
     * @param int $step
     * @param int $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, int $currentValue = null, int $step = 1, int $defaultValue = 0)
    {
        parent::__construct($name, $label, (string) $currentValue, $defaultValue);

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
     * @return string
     */
    public function getInputType() : string
    {
        return 'number';
    }

    /**
     * @return HtmlInput
     */
    public function getInputElement()
    {
        $input = parent::getInputElement();

        $input->setHtmlAttribute('step', $this->step);

        return $input;
    }
}