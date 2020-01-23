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
     * Element constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = Str::slugify($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}