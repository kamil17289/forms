<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;

/**
 * Class Toolbar
 * @package Nethead\Forms\Structures
 */
class Toolbar extends Structure {
    /**
     * Toolbar constructor.
     * @param string $id
     * @param array $elements
     */
    public function __construct(string $id, array $elements = [])
    {
        parent::__construct($elements);

        $this->getWrapper()
            ->attrs()->set('id', $id);
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
            'class' => 'toolbar'
        ];
    }
}