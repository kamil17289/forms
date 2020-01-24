<?php

namespace Nethead\Forms\Commons;

use Nethead\Markup\Html\Tag;

/**
 * Trait HasHtmlRepresentation
 * @package Nethead\Forms\Commons
 */
trait HasHtmlRepresentation {
    /**
     * @var Tag|null
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
     * @return Tag|null
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param array $attributes
     */
    public function updateHtmlRepresentation(array $attributes)
    {
        $this->html->mergeHtmlAttributes($attributes);
    }
}