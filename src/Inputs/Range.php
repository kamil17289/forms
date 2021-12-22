<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Range
 * @package Nethead\Forms\Inputs
 */
class Range extends Input {
    /**
     * @var int|mixed
     */
    protected $min = 0;

    /**
     * @var int|mixed
     */
    protected $max = 100;

    /**
     * Range constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $defaultValue
     * @param string|null $label
     * @param int $min
     * @param int $max
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $defaultValue = '', string $label = null, $min = 0, $max = 100, string $id = '')
    {
        parent::__construct($name, $currentValue, $defaultValue, $label, $id);

        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @param $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return int|mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return int|mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'range';
    }
}