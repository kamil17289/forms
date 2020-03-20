<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;

class Block extends Structure {
    public function wrapperTag()
    {
        return 'div';
    }
}