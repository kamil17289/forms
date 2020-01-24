<?php

namespace Nethead\Forms\Abstracts;

/**
 * Class Structure
 * @package Nethead\Forms\Abstracts
 */
abstract class Structure {
    /**
     * @var array
     */
    public $elements = [];

    /**
     * Structure constructor.
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
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
     * @param object $element Any object that can be converted to string
     */
    public function addElement(object $element)
    {
        if (method_exists($element, '__toString')) {
            $this->elements[] = $element;
        }
    }

    /**
     * @return array
     */
    public function getElements() : array
    {
        return $this->elements;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    abstract public function render() : string;
}