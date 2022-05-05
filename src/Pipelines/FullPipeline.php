<?php

namespace Nethead\Forms\Pipelines;

use Nethead\Forms\Renderers\Input;
use Nethead\Forms\Renderers\Label;
use Nethead\Forms\Renderers\Messages;
use Nethead\Forms\Renderers\Wrapper;

/**
 *
 */
class FullPipeline extends Pipeline {
    /**
     * @var string[]
     */
    public static $pipes = [
        Label::class,
        Input::class,
        Messages::class,
        Wrapper::class,
    ];
}