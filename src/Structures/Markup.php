<?php

namespace Nethead\Forms\Structures;

use Nethead\Forms\Abstracts\Structure;
use Nethead\Markup\Foundation\Tag;

/**
 * Class Markup
 * @package Nethead\Forms\Structures
 */
class Markup extends Structure {
    /**
     * Markup constructor.
     * @param array $elements
     * @param string|null $wrapperTag
     * @param array $wrapperAttributes
     */
    public function __construct(array $elements = [], string $wrapperTag = null, array $wrapperAttributes = [])
    {
        parent::__construct($elements);

        if (! is_null($wrapperTag)) {
            $wrapper = new Tag($wrapperTag);

            if (! empty($wrapperAttributes)) {
                $wrapper->attrs()->setMany($wrapperAttributes);
            }

            $this->wrapper = $wrapper;
        }
    }
}