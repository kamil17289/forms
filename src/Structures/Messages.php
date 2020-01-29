<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;
use Nethead\Markup\Html\Tag;

/**
 * Class FormGroup
 * @package Nethead\Forms\Structures
 */
class Messages extends Structure {
    /**
     * Messages constructor.
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        array_walk($elements, function (&$value, $key) {
            $value = new Tag('div', [
                'class' => 'alert alert-' . $value['severity']
            ], $value['message']);
        });

        parent::__construct($elements);
    }

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
            'class' => 'messages'
        ];
    }
}