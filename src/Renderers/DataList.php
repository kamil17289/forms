<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Datalist as HtmlDataList;
use Nethead\Forms\Inputs\DataList as DataListField;

class DataList extends Input {
    /**
     * @var array
     */
    public static $options = [];

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        if ($element instanceof DataListField) {
            $fragment->push('list', static::createDataList($element));

            parent::render($fragment, $element, $options);

            $fragment->get('input')->attrs()
                ->set('list', $element->getListId());
        }
    }

    public static function createDataList(Element $element)
    {
        $values = array_values($element->getOptions());

        $options = Select::createOptions(array_combine($values, $values));

        return new HtmlDataList($element->getListId(), [], $options);
    }
}