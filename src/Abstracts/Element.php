<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasHtmlRepresentation;
use Nethead\Forms\Helpers\Str;

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
     * @var string
     */
    public $id;

    /**
     * Element constructor.
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        $this->name = $name;

        $this->id = $this->generateID();
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
     * @throws \Exception
     * @return string
     */
    protected function generateID()
    {
        return $this->getName() . '-' . Str::random(5);
    }

    /**
     * @return string
     */
    public function getID() : string
    {
        return $this->id;
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
    abstract public function render();
}