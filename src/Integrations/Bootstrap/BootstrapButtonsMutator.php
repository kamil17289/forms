<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Forms\Contracts\Mutable;

class BootstrapButtonsMutator {
    public $variant = 'primary';

    public function __construct(string $variant = 'primary')
    {
        $this->variant = $variant;
    }

    public function __invoke(Mutable $control)
    {
        $button = $control->getMutableElement();

        $button->appendToAttribute('class', 'btn btn-' . $this->variant);
    }
}