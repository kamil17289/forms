<?php

namespace Nethead\Forms\Integrations\Bootstrap;

use Nethead\Forms\Abstracts\Control;

class BootstrapButtonsMutator {
    public function __invoke(Control $control, string $variant = 'primary')
    {
        $html = $control->getHtml();


    }
}