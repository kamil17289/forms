<?php

namespace Nethead\Forms\Inputs;

use Nethead\Markup\Tags\Input as HtmlInput;

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
    protected function getInputElement(): HtmlInput
    {
        $input = parent::getInputElement();

        $input->attrs()->remove('value');

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