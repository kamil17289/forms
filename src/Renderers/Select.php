<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Tags\Optgroup as HtmlOptGroup;
use Nethead\Markup\Tags\Option as HtmlOption;
use Nethead\Markup\Tags\Select as HtmlSelect;

class Select extends Renderer {
    /**
     * @var array
     */
    public static $options = [];

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return mixed|void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        $options = parent::options($options, 'input');

        $options['id'] = $element->getId();
        $options['form'] = $element->getFormId();

        $options = array_filter($options);

        $input = new HtmlSelect(
            $element->getName(),
            static::createOptions($element->getOptions(), $element->getValue()),
            $options
        );

        if (is_array($element->getValue())) {
            $input->multiple();
        }

        $fragment->push('input', $input);
    }

    /**
     * @param array $options
     * @param array|string|bool $active
     * @return array
     */
    public static function createOptions(array $options, $active = false): array
    {
        $htmlOptions = [];

        foreach($options as $value => $label) {
            if (is_array($label)) {
                $htmlOptions[] = static::createOptGroup($value, $label, $active);
            }
            else {
                $htmlOptions[] = static::createOption($value, $label, $active);
            }
        }

        return $htmlOptions;
    }

    /**
     * @param string $groupLabel
     * @param array $options
     * @param $active
     * @return HtmlOptGroup
     */
    public static function createOptGroup(string $groupLabel, array $options, $active): HtmlOptGroup
    {
        $htmlOptions = [];

        foreach($options as $value => $label) {
            $htmlOptions[] = self::createOption($value, $label, $active);
        }

        return new HtmlOptGroup($groupLabel, $htmlOptions);
    }

    /**
     * @param $value
     * @param $text
     * @param $active
     * @return HtmlOption
     */
    public static function createOption($value, $text, $active): HtmlOption
    {
        $option = new HtmlOption($value, $text);

        if ((is_array($active) && in_array($value, $active)) || $value == $active) {
            $option->selected();
        }

        return $option;
    }
}