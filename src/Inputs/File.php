<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Html\Input as HtmlInput;

/**
 * Class File
 * @package Nethead\Forms\Inputs
 */
class File extends Text {
    /**
     * File constructor.
     * @param string $name
     * @param string $label
     * @throws \Exception
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct($name, $label, '', '');
    }

    /**
     * @return HtmlInput
     */
    protected function getInputElement()
    {
        $input = parent::getInputElement();

        $input->removeHtmlAttribute('value');

        return $input;
    }

    /**
     * @return string
     */
    protected function getInputType(): string
    {
        return 'file';
    }
}