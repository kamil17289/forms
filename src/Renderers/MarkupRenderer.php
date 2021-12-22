<?php

namespace Nethead\Forms\Renderers;

use Nethead\Markup\Tags\Optgroup as HtmlOptGroup;
use Nethead\Markup\Tags\Textarea as HtmlTextArea;
use Nethead\Markup\Tags\Datalist as HtmlDataList;
use Nethead\Forms\Contracts\RendererInterface;
use Nethead\Forms\Contracts\MutatorInterface;
use Nethead\Markup\Tags\Select as HtmlSelect;
use Nethead\Markup\Tags\Option as HtmlOption;
use Nethead\Markup\Foundation\Tag as HtmlTag;
use Nethead\Markup\Tags\Button as HtmlButton;
use Nethead\Markup\Tags\Input as HtmlInput;
use Nethead\Markup\Tags\Label as HtmlLabel;
use Nethead\Forms\Inputs\BooleanCheckbox;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Forms\Abstracts\DataField;
use Nethead\Forms\Abstracts\Element;
use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Inputs\Floating;
use Nethead\Forms\Inputs\TextArea;
use Nethead\Forms\Inputs\DataList;
use Nethead\Forms\Controls\Button;
use Nethead\Forms\Inputs\Integer;
use Nethead\Forms\Inputs\Select;
use Nethead\Forms\Inputs\Range;
use Nethead\Forms\Inputs\Radio;
use Nethead\Forms\Inputs\File;
use Nethead\Forms\Inputs\Text;
use Nethead\Forms\Inputs\Id;

/**
 * Class MarkupRenderer
 * @package Nethead\Forms\Renderers
 */
class MarkupRenderer implements RendererInterface {
    /**
     * Indicates that the input element is present. should be rendered.
     */
    const MODE_INPUT    = 0b00001;

    /**
     * Indicates that if label element is present, should be rendered.
     */
    const MODE_LABEL    = 0b00010;

    /**
     * Indicates that if messages are present, should be rendered.
     */
    const MODE_MESSAGES = 0b00100;

    /**
     * Indicates that input, label and messages should rendered inside of wrapper element.
     */
    const MODE_WRAP     = 0b01000;

    /**
     * A bitwise & from the modes above.
     */
    const MODE_FULL     = 0b01111;

    /**
     * Indicates that if any mutators are set, they should be used to alter elements.
     */
    const MODE_MUTATE   = 0b10000;

    /**
     * @var array
     *  Array of rendering functions used for converting the Elements into strings.
     */
    protected $renderers = [
        'label'    => [MarkupRenderer::class, 'label_element'],
        'input'    => [MarkupRenderer::class, 'input_element'],
        'messages' => [MarkupRenderer::class, 'messages_element'],
        'buttons'  => [MarkupRenderer::class, 'button_element'],
        'wrapper'  => [MarkupRenderer::class, 'wrapper_element'],
    ];

    /**
     * @var array
     *  Array of registered mutators.
     */
    protected $mutators = [];

    /**
     * Current rendering mode. Default mode will only render
     * Input and Label elements inside of a wrapper.
     * @var int
     *  Rendering mode
     */
    protected $mode = 0;

    /**
     * MarkupRenderer constructor.
     * @param int $mode
     *  Rendering mode.
     */
    public function __construct(int $mode = self::MODE_INPUT | self::MODE_LABEL | self::MODE_WRAP)
    {
        $this->mode = $mode;
    }

    /**
     * Set the rendering function for different elements types. There are 4 types of elements
     * that can be rendered to display a form field in HTML. See below $type parameter.
     * @param string $type
     *  Can be "label"|"input"|"messages"|"buttons"|"wrapper".
     * @param callable $renderer
     *  A callable to use for rendering the element type.
     */
    public function setRenderer(string $type, callable $renderer): void
    {
        $this->renderers[$type] = $renderer;
    }

    /**
     * Set the mutator for the elements. Mutators are callables that can alter
     * the attributes of an HTML element after it is created by a renderer.
     * @param MutatorInterface $mutator
     *  A callable that can change/add/remove attributes of HTML objects.
     * @see MutatorInterface
     */
    public function setMutator(MutatorInterface $mutator): void
    {
        $this->mutators[] = $mutator;
    }

    /**
     * Internal function for calling mutators on HTML fragments.
     * @param Element $element
     *  The currently rendered Element.
     * @param Fragment $fragment
     *  HTML Fragment we're building.
     */
    protected function mutate(Element $element, Fragment $fragment)
    {
        foreach($this->mutators as $mutator) {
            call_user_func($mutator, $element, $fragment);
        }
    }

    /**
     * Render the Element object.
     * @param Element $element
     *  Element object that will be converted to HTML string.
     * @return string
     *  A valid HTML code.
     */
    public function render(Element $element): string
    {
        $fragment = new Fragment();

        if ($element instanceof DataField) {
            if ($this->mode & self::MODE_LABEL) {
                $this->callElementRenderer('label', $element, $fragment);
            }

            if ($this->mode & self::MODE_INPUT) {
                $this->callElementRenderer('input', $element, $fragment);
            }

            if ($this->mode & self::MODE_MESSAGES) {
                $this->callElementRenderer('messages', $element, $fragment);
            }
        }

        if ($element instanceof Button) {
            $this->callElementRenderer('buttons', $element, $fragment);
        }

        if ($this->mode & self::MODE_MUTATE) {
            $this->mutate($element, $fragment);
        }

        if ($this->mode & self::MODE_WRAP) {
            $fragment = call_user_func($this->renderers['wrapper'], $fragment);
        }

        return (string) $fragment;
    }

    /**
     * @param string $type
     *  Rendering function type.
     * @param Element $element
     *  Element that is being rendered.
     * @param Fragment $fragment
     *  HTML fragment that we're building.
     */
    protected function callElementRenderer(string $type, Element $element, Fragment $fragment)
    {
        call_user_func_array($this->renderers[$type], [$element, $fragment]);
    }

    /**
     * Quickly use renderer in functional way.
     * @param Element $element
     *  Element that is being rendered.
     * @return string
     *  HTML code.
     */
    public function __invoke(Element $element): string
    {
        return $this->render($element);
    }

    /**
     * Renders a <label> element.
     * @param DataField $element
     * @param Fragment $fragment
     */
    public function label_element(DataField $element, Fragment $fragment): void
    {
        if ($element->getLabel()) {
            $label = new HtmlLabel(
                $element->getId(),
                $element->getLabel()
            );

            $fragment->push('label', $label);
        }
    }

    /**
     * Renders an <input>, <select>, and <textarea> elements from DataField object.
     * @param DataField $element
     * @param Fragment $fragment
     */
    public function input_element(DataField $element, Fragment $fragment): void
    {
        $input = static::getBaseInput($element);

        if ($element instanceof Range) {
            $input->attrs()->setMany([
                'min' => $element->getMin(),
                'max' => $element->getMax(),
            ]);
        }

        if ($element instanceof Integer || $element instanceof Floating) {
            $input->attrs()->set('step', $element->getStep());
        }

        if ($element instanceof Id) {
            $input->attrs()->set('readonly', true);
        }

        if ($element instanceof Text) {
            $input->attrs()->set('size', $element->getSize());
        }

        if ($element instanceof Radio) {
            $input->attrs()->set('checked', $element->getValue() == $element->getSelectedValue());
        }

        if ($element instanceof File) {
            $input->attrs()->remove('value');
        }

        if ($element instanceof DataList) {
            $input->attrs()->set('list', $element->getListId());

            $fragment->push('list', static::createDataList($element));
        }

        if ($element instanceof BooleanCheckbox) {
            $fragment->push('hidden-false', new HtmlInput(
                'hidden',
                $element->getName(),
                0
            ));
        }

        $fragment->push('input', $input);
    }

    /**
     * Renders any notifications you add on the Elements.
     * @param DataField $element
     * @param Fragment $fragment
     */
    public function messages_element(DataField $element, Fragment $fragment): void
    {
        if ($element->hasMessages()) {
            $messages = [];

            foreach($element->getAllMessages() as $message) {
                $messages[] = new HtmlTag('div', ['class' => $message['severity']], [$message['message']]);
            }

            $messageWrapper = new HtmlTag('div', [], $messages);

            $fragment->push('messages', $messageWrapper);
        }
    }

    /**
     * Renders <button> elements from Button object.
     * @param Button $element
     * @param Fragment $fragment
     */
    public function button_element(Button $element, Fragment $fragment): void
    {
        $attrs = [
            'id' => $element->getId(),
            'form' => $element->getFormId(),
            'name' => $element->getName()
        ];

        $button = new HtmlButton($element->getType(), '', $attrs, [
            $element->getText()
        ]);

        $fragment->push('button', $button);
    }

    /**
     * Wraps the HTML fragment inside of a <div> element.
     * @param Fragment $fragment
     * @return HtmlTag
     */
    public function wrapper_element(Fragment $fragment): HtmlTag
    {
        return $fragment->wrap('div');
    }

    /**
     * Create a base <input>, <select> or <textarea> element.
     * @param DataField $element
     * @return HtmlTag
     */
    protected function getBaseInput(DataField $element): HtmlTag
    {
        $attrs = [
            'id' => $element->getId(),
            'form' => $element->getFormId()
        ];

        $name = $element->getName();
        $value = $element->getValue();

        if ($element instanceof Input) {
            $type = $element->getInputType();

            return new HtmlInput($type, $name, $value, array_filter($attrs));
        }

        if ($element instanceof TextArea) {
            return new HtmlTextArea($name, array_filter($attrs), [$value]);
        }

        if ($element instanceof Select) {
            $options = static::createOptions($element->getOptions(), $value);

            return new HtmlSelect($name, $options, array_filter($attrs));
        }
    }

    /**
     * Create options for <datalist> or <select>
     * @param array $options
     * @param mixed $active
     * @return array
     */
    protected function createOptions(array $options, $active = false): array
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
     * Create a <optgroup> element.
     * @param string $groupLabel
     * @param array $options
     * @param mixed $active
     * @return HtmlOptGroup
     */
    protected function createOptGroup(string $groupLabel, array $options, $active): HtmlOptGroup
    {
        $htmlOptions = [];

        foreach($options as $value => $label) {
            $htmlOptions[] = self::createOption($value, $label, $active);
        }

        return new HtmlOptGroup($groupLabel, $htmlOptions);
    }

    /**
     * Create a <option> element.
     * @param $value
     * @param $text
     * @param mixed $active
     * @return HtmlOption
     */
    protected function createOption($value, $text, $active): HtmlOption
    {
        $option = new HtmlOption($value, $text);

        if ($value == $active) {
            $option->attrs()->set('selected', true);
        }

        return $option;
    }

    /**
     * Create a <datalist> element.
     * @param DataList $element
     * @return HtmlDataList
     */
    protected function createDataList(DataList $element): HtmlDataList
    {
        $values = array_values($element->getOptions());

        $options = static::createOptions(array_combine($values, $values));

        return new HtmlDataList($element->getListId(), [], $options);
    }
}
