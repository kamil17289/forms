<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Forms\Contracts\Mutable;

class BootstrapInputMutator {
    public function __invoke(Mutable $input)
    {
        $tag = $input->getMutableElement();

        $tag->classList()->add('form-control');

        return $input;
    }
}