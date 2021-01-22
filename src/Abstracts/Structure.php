<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Markup\Foundation\Tag;

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
     * @var Tag|null
     */
    public $wrapper = null;

    /**
     * Structure constructor.
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->addElements($elements);

        if (method_exists($this, 'wrapperTag')) {
            $wrapperTag = static::wrapperTag();

            $this->wrapper = new Tag($wrapperTag);

            if (method_exists($this, 'wrapperAttributes')) {
                $wrapperAttributes = static::wrapperAttributes();

                $this->wrapper->attrs()->setMany($wrapperAttributes);
            }
        }
    }

    /**
     * @param Tag $wrapper
     */
    public function setWrapper(Tag $wrapper)
    {
        $this->wrapper = $wrapper;
    }

    /**
     * @return Tag|null
     */
    public function getWrapper(): ?Tag
    {
        return $this->wrapper;
    }

    /**
     * @param array $elements
     */
    public function addElements(array $elements)
    {
        if (! empty($elements)) {
            foreach($elements as $name => $element) {
                $this->addElement($name, $element);
            }
        }
    }

    /**
     * @param string $name
     * @param object $element Any object that can be converted to string
     */
    public function addElement(string $name, object $element)
    {
        if (method_exists($element, '__toString')) {
            $this->elements[$name] = $element;
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
     * @param string $name
     * @param null $default
     * @return Tag|Structure|null
     */
    public function getElement(string $name, $default = null)
    {
        if (isset($this->elements[$name])) {
            return $this->elements[$name];
        }

        return $default;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasElement(string $name): bool
    {
        return array_key_exists($name, $this->elements);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function render() : string
    {
        if (! is_null($this->wrapper)) {
            $this->wrapper->setChildren($this->getElements());

            return (string) $this->wrapper;
        }

        return implode(PHP_EOL, $this->getElements());
    }
}