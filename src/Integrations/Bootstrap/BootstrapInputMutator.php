<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Forms\Abstracts\Input;

class BootstrapInputMutator {
    public function __invoke(Input $input)
    {
        $tag = $input->getMutableElement();

        $tag->appendToAttribute('class', 'form-control');

        return $input;
    }
}