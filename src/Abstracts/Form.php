<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Markup\Tags\Form as HtmlForm;
use RuntimeException;

/**
 * Class Form
 * Abstract form should be extended to create own specific forms.
 * @package Nethead\Forms\Abstracts
 */
abstract class Form {
    /**
     * Internal flag, says if the form have file inputs.
     * @var bool
     */
    protected $hasFiles = false;

    /**
     * HTTP method to use for sending the data.
     * @var string
     */
    protected $method = 'POST';

    /**
     * Specifies the character encodings
     * @var string
     */
    protected $charset = 'UTF-8';

    /**
     * Elements within this form.
     * @var array
     */
    protected $elements = [];

    /**
     * HTML ID of this form. It will be assigned for all elements
     * added with addElement()
     * @var string
     * @see Form::addElement()
     */
    protected $formId = '';

    /**
     * Object representing the form HTML.
     * @var HtmlForm
     */
    protected $html;

    /**
     * This method must be implemented by extending class.
     * Each specific form uses it for adding elements.
     * From inside of the method, you can use the addElement() to add
     * new Element to the Form and bind it.
     * @see Form::addElement()
     */
    abstract protected function createInputs(): void;

    /**
     * Required method which returns the action of the form
     * (where the data should be sent).
     * @return string
     */
    abstract public function getAction(): string;

    /**
     * Form constructor. Calls the createInputs() method of
     * the extending class to fill the form with Elements.
     * @param string $method
     *  HTTP method
     * @param bool $hasFiles
     *  Flag for indicating if the form have files inputs.
     * @param string $charset
     *  Characters encoding that will be used for sending data.
     */
    public function __construct(string $method = 'POST', bool $hasFiles = false, string $charset = 'UTF-8')
    {
        $this->setMethod($method);

        $this->charset = $charset;

        $this->hasFiles = $hasFiles;

        static::createInputs();
    }

    /**
     * All Forms are by default set to use POST, but this method
     * can be called to change it.
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        if (empty($method))
            return;

        $method = strtoupper($method);

        $this->method = $method;
    }

    /**
     * Get the Form HTTP method, if you're curious.
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Check if the form has any file inputs.
     * @return bool TRUE if yes, FALSE otherwise.
     */
    public function hasFiles(): bool
    {
        return $this->hasFiles;
    }

    /**
     * Set the form's HTML ID.
     * If empty string is provided, ID will be random.
     * @param string $formId
     */
    public function setFormId(string $formId): void
    {
        if (empty($formId)) {
            $formId = Element::randomId();
        }

        $this->formId = $formId;
    }

    /**
     * Get the Form HTML ID.
     * @return string
     */
    public function getFormId(): string
    {
        return $this->formId;
    }

    /**
     * Get the Forms characters encoding.
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * Register new Element in the form. Should be used
     * inside of the createElements(), but can also register
     * additional elements if you need them. All elements are
     * automatically assigned to the form with its form ID.
     * @param Element $element
     */
    public function addElement(Element $element): void
    {
        $element->setFormId($this->formId);

        $this->elements[$element->getName()] = $element;
    }

    /**
     * Get the Element of specified name.
     * @param string $name
     * @return Element|null
     */
    public function getElement(string $name): ?Element
    {
        return $this->elements[$name] ?? null;
    }

    /**
     * Get an array of all elements.
     * @return array
     */
    public function getAllElements(): array
    {
        return $this->elements;
    }

    /**
     * Get an array of element's names.
     * @return array
     */
    public function getElementsNames(): array
    {
        return array_keys($this->elements);
    }

    /**
     * Convert the form to an array where data names are keys,
     * and values are data values of each form's element.
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach($this->elements as $name => $element) {
            if (method_exists($element, 'getValue')) {
                $array[$name] = $element->getValue();
            }
        }

        return $array;
    }

    /**
     * Quickly fill the form with data from array.
     * @param array $data
     */
    public function fillFromArray(array $data): void
    {
        foreach($this->elements as $name => $input) {
            if (array_key_exists($name, $data) && ! is_array($data[$name])) {
                $input->setValue($data[$name]);
            }
        }
    }

    /**
     * Create form instance already filled with data from provided array.
     * @param array $data
     * @return Form
     */
    public static function createFromArray(array $data): Form
    {
        $form = new static();

        $form->fillFromArray($data);

        return $form;
    }

    /**
     * Create internal HtmlForm instance for printing <form> tag.
     */
    protected function preRender(): void
    {
        $this->html = new HtmlForm(
            $this->getAction(),
            $this->getMethod(),
            [
                'id' => $this->getFormId()
            ],
            []
        );

        $this->html->acceptCharset($this->getCharset());

        $this->html->enctype($this->hasFiles() ? HtmlForm::ENCTYPE_MULTIPART : HtmlForm::ENCTYPE_URLENCODED);
    }

    /**
     * Print opening of the <form> with attributes based on configuration.
     * @return string
     */
    public function open(): string
    {
        $this->preRender();

        return $this->html->open();
    }

    /**
     * Print closing </form> tag.
     * @return string
     */
    public function close(): string
    {
        return $this->html->close();
    }

    /**
     * Render an Element using the registered renderer.
     * @param string $name
     *  Name of the element you want to render.
     * @return string
     *  HTML code as string.
     * @throws RuntimeException
     *  When element doesn't exists.
     */
    public function render(string $name, $renderingOptions = []): string
    {
        $element = $this->getElement($name);

        if (! $element)
            throw new RuntimeException('Element ' . $name . ' not found!');

        return $element->render($renderingOptions);
    }
}