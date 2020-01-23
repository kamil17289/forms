<?php

namespace Nethead\Forms\Abstracts;

/**
 * Class Structure
 * @package Nethead\Forms\Abstracts
 */
abstract class Structure extends Element {
    /**
     * @var array
     */
    public $elements = [];

    /**
     * Structure constructor.
     * @param string $name
     * @param array $elements
     */
    public function __construct(string $name, array $elements = [])
    {
        parent::__construct($name);

        $this->addElements($elements);
    }

    /**
     * @param array $elements
     */
    public function addElements(array $elements)
    {
        if (! empty($elements)) {
            foreach($elements as $element) {
                $this->addElement($element);
            }
        }
    }

    /**
     * @param Element $element
     */
    public function addElement(Element $element)
    {
        $this->elements[$element->getName()] = $element;
    }
}