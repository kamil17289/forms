<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasHtmlRepresentation;
use Nethead\Forms\Helpers\Str;
use Nethead\Markup\Html\Tag;

/**
 * Class Element
 * @package Nethead\Forms\Abstracts
 */
abstract class Element {
    use HasHtmlRepresentation;

    /**
     * @var string
     */
    public $name;

    /**
     * Element constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = Str::slugify($name);
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function render()
    {
        return (string) $this->createHTML();
    }

    /**
     * @return Tag
     */
    abstract protected function createHTML() : Structure;
}