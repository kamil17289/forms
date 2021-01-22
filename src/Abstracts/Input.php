<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasLabel;
use Nethead\Forms\Commons\HasValue;
use Nethead\Forms\Commons\IsMutable;
use Nethead\Forms\Commons\ShowsMessages;
use Nethead\Forms\Contracts\Mutable;
use Nethead\Forms\Structures\Block;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Foundation\Tag;
use Exception;

/**
 * Class Input
 * @package Nethead\Forms\Abstracts
 */
abstract class Input extends Element implements Mutable {
    use HasValue, ShowsMessages, HasLabel, IsMutable;

    /**
     * Input constructor.
     * @param string $name
     * @param string $label
     * @param null $currentValue
     * @param string $defaultValue
     * @throws Exception
     */
    public function __construct(string $name, string $label, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name);

        $this->setDefaultValue($defaultValue);
        $this->setValue($currentValue);

        $this->setLabel($label, $this->getID());

        $markup = $this->getStructure();

        if (method_exists($markup, 'mutate')) {
            $markup->mutate();
        }

        $markup->addElements($this->getFieldset());

        $this->setHtml($markup);

        $this->mutate();
    }

    /**
     * Create a structure for the input
     * @return Structure
     */
    protected function getStructure() : Structure
    {
        return new Block();
    }

    /**
     * Get array of elements for this input
     * @return array
     */
    protected function getFieldset() : array
    {
        $inputElement = static::getInputElement();

        return [
            'label' => $this->getLabel(),
            'input' => $inputElement,
            'messages' => new Messages($this->getAllMessages())
        ];
    }

    /**
     * @return Structure|Tag|null
     */
    public function getMutableElement() : Tag
    {
        return $this->getHtml()
            ->getElement('input');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function render(): string
    {
        return (string) $this->getHtml()->render();
    }

    /**
     * @return mixed
     */
    abstract protected function getInputElement();
}