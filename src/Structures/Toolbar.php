<?php

namespace Nethead\Forms\Structures;

class Toolbar extends FormGroup {
    public function __construct(string $id, array $elements = [])
    {
        parent::__construct($elements);

        $wrapper = $this->getWrapper();

        $wrapper->appendToAttribute('class', 'toolbar');
        $wrapper->setHtmlAttribute('id', $id);
    }
}