<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Markup\Tags\Input as HtmlInput;
use Nethead\Markup\Tags\Option;
use Nethead\Markup\Tags\Datalist as HtmlDatalist;

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
    protected function getInputElement(): HtmlInput
    {
        return new HtmlInput('text', $this->getName(), $this->getValue(), [
            'id' => $this->getID(),
            'list' => $this->getID() . '_list'
        ]);
    }

    /**
     * @return HtmlDatalist
     */
    protected function getDataList(): HtmlDatalist
    {
        $options = array_map(function ($option) {
            return new Option($option, '');
        }, $this->options);

        return new HtmlDatalist($this->getID() . '_list', [], $options);
    }
}