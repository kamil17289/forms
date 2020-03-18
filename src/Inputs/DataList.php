<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Html\Input as HtmlInput;
use Nethead\Markup\Html\Option;

/**
 * Class DataList
 * @package Nethead\Forms\Inputs
 */
class DataList extends FormInput {
    /**
     * @var string
     */
    protected $listID = '';

    /**
     * @var array
     */
    protected $options = [];

    /**
     * DataList constructor.
     * @param string $name
     * @param string $label
     * @param array $options
     * @param null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, array $options, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name, $label, $currentValue, $defaultValue);

        $this->options = $options;

        $this->getHtml()
            ->addElement('datalist', $this->getDataList());
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement()
    {
        return new HtmlInput('text', $this->getName(), $this->getValue(), [
            'id' => $this->getID(),
            'list' => $this->getID() . '_list'
        ]);
    }

    /**
     * @return \Nethead\Markup\Html\Datalist
     */
    protected function getDataList()
    {
        $options = array_map(function ($option) {
            return new Option($option, '');
        }, $this->options);

        return new \Nethead\Markup\Html\Datalist($this->getID() . '_list', [], $options);
    }
}