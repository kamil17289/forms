<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Markup\Html\Tag;

class BootstrapInputMutator {
    public function __invoke(Tag $input)
    {
        $input->appendToAttribute('class', 'form-control');

        return $input;
    }
}