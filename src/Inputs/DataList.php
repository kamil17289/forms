<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input as FormInput;
use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Messages;
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

        $this->listID = $this->getID() . '_list';

        $this->options = $options;

        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'input' => $this->getInput(),
            'datalist' => $this->getDataList(),
            'messages' => new Messages($this->getAllMessages())
        ]));
    }

    /**
     * @return HtmlInput
     */
    protected function getInput()
    {
        return new HtmlInput('text', $this->getName(), $this->getValue(), [
            'id' => $this->getID(),
            'list' => $this->listID
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

        return new \Nethead\Markup\Html\Datalist($this->listID, [], $options);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        return (string) $this->getHtml();
    }
}