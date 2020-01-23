<?php

namespace Nethead\Forms\Commons;

use Nethead\Markup\Html\Tag;

/**
 * Trait HasHtmlRepresentation
 * @package Nethead\Forms\Commons
 */
trait HasHtmlRepresentation {
    /**
     * @var null
     */
    protected $html = null;

    /**
     * @param Tag $tag
     */
    public function setHtml(Tag $tag)
    {
        $this->html = $tag;
    }

    /**
     * @return null
     */
    public function getHtml()
    {
        return $this->html;
    }
}