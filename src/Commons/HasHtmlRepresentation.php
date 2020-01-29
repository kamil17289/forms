<?php

namespace Nethead\Forms\Commons;

use Nethead\Forms\Abstracts\Structure;

/**
 * Trait HasHtmlRepresentation
 * @package Nethead\Forms\Commons
 */
trait HasHtmlRepresentation {
    /**
     * @var Structure|null
     */
    protected $html = null;

    /**
     * @param Structure $structure
     */
    public function setHtml(Structure $structure)
    {
        $this->html = $structure;
    }

    /**
     * @return Structure|null
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $name
     * @param array $attributes
     */
    public function updateHtmlRepresentation(string $name, array $attributes = [])
    {
        if ($this->getHtml()->hasElement($name)) {
            $this->getHtml()
                ->getElement($name)
                ->mergeHtmlAttributes($attributes);
        }
    }
}