<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Html\Optgroup;
use Nethead\Markup\Html\Option;
use Nethead\Markup\Html\Select as HtmlSelect;

/**
 * Class Select
 * @package Nethead\Forms\Inputs
 */
class Select extends FormInput {
    /**
     * @var array
     */
    protected $options = [];

    /**
     * Select constructor.
     * @param string $name
     * @param string $label
     * @param array $options
     * @param null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, array $options = [], $currentValue = null, $defaultValue = '')
    {
        $this->setOptions($options);

        parent::__construct($name, $label, $currentValue, $defaultValue);
    }

    /**
     * @param array $options
     */
    protected function setOptions(array $options = [])
    {
        if (empty($options)) {
            if (method_exists($this, 'getDefaultOptions')) {
                $options = $this->getDefaultOptions();
            }
        }

        foreach($options as $value => $label) {
            if (is_array($label)) {
                // we have an optgroup
                $this->options[] = $this->createOptGroup($value, $label);
            }
            else {
                $this->options[] = $this->createOption($value, $label);
            }
        }
    }

    /**
     * @param $text
     * @param array $options
     * @return Optgroup
     */
    protected function createOptGroup($text, array $options)
    {
        $opts = [];

        foreach($options as $value => $label) {
            if (is_array($label)) {
                $opts[] = call_user_func([$this, 'createOptGroup'], $value, $label);
            }
            else {
                $opts[] = $this->createOption($value, $label);
            }
        }

        return new Optgroup($text, [], $opts);
    }

    /**
     * @param $value
     * @param $text
     * @return Option
     */
    protected function createOption($value, $text)
    {
        return new Option($value, $text);
    }

    /**
     * @return HtmlSelect
     */
    protected function getInputElement()
    {
        return new HtmlSelect($this->getName(), $this->options);
    }

    public function render()
    {
        return (string) $this->getHtml()->render();
    }
}