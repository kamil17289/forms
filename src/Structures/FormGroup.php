<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;
use Nethead\Markup\Html\Tag;

/**
 * Class FormGroup
 * @package Nethead\Forms\Structures
 */
class FormGroup extends Structure {
    /**
     * @return string
     */
    public function render() : string
    {
        return (string) new Tag('div', [], $this->getElements());
    }
}