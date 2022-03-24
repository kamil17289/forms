<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Radio
 * @package Nethead\Forms\Inputs
 */
class Radio extends Input {
    /**
     * @var mixed|string
     */
    protected $selectedValue = '';

    /**
     * Real name of the radio button
     * @var string
     */
    protected $realName = '';

    /**
     * @var array
     */
    protected static $namesRegister = [];

    /**
     * Radio constructor.
     * @param string $name
     * @param null $currentValue
     * @param string $selectedValue
     * @param string|null $label
     * @param string $id
     */
    public function __construct(string $name, $currentValue = null, $selectedValue = '', string $label = null, string $id = '')
    {
        $this->realName = $name;

        parent::__construct(self::removeNameConflicts($name), $currentValue, $currentValue, $label, $id);

        $this->selectedValue = $selectedValue;
    }

    /**
     * @return mixed|string
     */
    public function getSelectedValue()
    {
        return $this->selectedValue;
    }

    /**
     * @return string
     */
    public function getRealName(): string
    {
        return $this->realName;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'radio';
    }

    /**
     * @param string $name
     * @return string
     */
    protected static function removeNameConflicts(string $name): string
    {
        if (isset(self::$namesRegister[$name])) {
            self::$namesRegister[$name]++;
        }
        else {
            self::$namesRegister[$name] = 1;
        }

        return sprintf('%s_%s', $name, self::$namesRegister[$name]);
    }
}