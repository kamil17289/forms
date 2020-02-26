<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;

/**
 * Class FormGroup
 * @package Nethead\Forms\Structures
 */
class FormGroup extends Structure
{
    /**
     * @return string
     */
    public function wrapperTag()
    {
        return 'div';
    }

    /**
     * @return array
     */
    public function wrapperAttributes()
    {
        return [
            'class' => 'form-group'
        ];
    }
}