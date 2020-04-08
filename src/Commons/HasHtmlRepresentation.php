<?php

namespace Nethead\Forms\Commons;

use Nethead\Forms\Abstracts\Structure;
use Nethead\Markup\Html\Tag;

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
     * @param string $name (if structure is nested, you can use the dot syntax,
     * e.g. 'markup.input')
     * @param array $attributes
     */
    public function updateHtmlRepresentation(string $name, array $attributes = [])
    {
        $html = $this->getHtml();

        if (strpos($name, '.') !== false) {
            $structure = explode('.', $name);

            $element = array_shift($structure);

            while ($html->hasElement($element)) {
                $html = $html->getElement($element);

                if (empty($structure)) break;

                $element = array_shift($structure);
            }
        }
        else {
            $html = $html->getElement($name);
        }

        if (is_a($html, Tag::class)) {
            $html->mergeHtmlAttributes($attributes);
        }
    }
}