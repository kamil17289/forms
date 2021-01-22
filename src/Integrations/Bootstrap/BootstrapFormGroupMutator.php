<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Forms\Abstracts\Structure;
use Nethead\Markup\Foundation\Tag;

class BootstrapFormGroupMutator {
    public function __invoke(Structure $structure): Structure
    {
        $structure->setWrapper(new Tag('div', [
            'class' => 'form-group'
        ]));

        return $structure;
    }
}