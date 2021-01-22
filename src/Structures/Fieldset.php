<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;

class Fieldset extends Structure {
    /**
     * @return string
     */
    public function wrapperTag(): string
    {
        return 'fieldset';
    }
}