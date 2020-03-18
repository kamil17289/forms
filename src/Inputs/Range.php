<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class Range
 * @package Nethead\Forms\Inputs
 */
class Range extends Text {
    /**
     * @var int
     */
    public $min = 0;

    /**
     * @var int
     */
    public $max = 100;

    /**
     * Range constructor.
     * @param string $name
     * @param string $label
     * @param string $currentValue
     * @param string $defaultValue
     * @param int $min
     * @param int $max
     * @throws \Exception
     */
    public function __construct(string $name, string $label, string $currentValue = '', string $defaultValue = '', int $min = 0, int $max = 100)
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);

        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'range';
    }

    /**
     * @return HtmlInput
     */
    public function getInputElement()
    {
        $input = parent::getInputElement();

        $input->mergeHtmlAttributes([
            'min' => $this->min,
            'max' => $this->max,
        ]);

        return $input;
    }
}