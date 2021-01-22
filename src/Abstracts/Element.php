<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasHtmlRepresentation;
use Nethead\Forms\Helpers\Str;
use Exception;

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
     * @throws Exception
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    protected function generateID(): string
    {
        $id = $this->getName() . '-';

        try {
            $random = Str::random(5);
        }
        catch (Exception $e) {
            $random = substr(uniqid(), 0, 5);
        }

        return $id . $random;
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
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @return string
     */
    abstract public function render(): string;
}