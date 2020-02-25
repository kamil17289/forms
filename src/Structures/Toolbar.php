<?php

namespace Nethead\Forms\Structures;

class Toolbar extends FormGroup {
    public function __construct(array $elements = [])
    {
        parent::__construct($elements);

        $this->getWrapper()
            ->appendToAttribute('class', 'toolbar');
    }
}