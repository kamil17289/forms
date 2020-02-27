<?php

namespace Nethead\Forms;

use Nethead\Forms\Abstracts\Element;
use Nethead\Forms\Commons\HasHtmlRepresentation;
use Nethead\Forms\Helpers\Str;
use Nethead\Forms\Structures\Markup;
use Nethead\Markup\Html\Form as HtmlForm;

/**
 * Class Form
 * @package Nethead\Forms
 */
abstract class Form {
    use HasHtmlRepresentation;

    /**
     * Human readable form title
     * @var
     */
    public $title;

    /**
     * Machine name for usage as id, class name or anything else
     * @var
     */
    protected $slug = '';

    /**
     * Determines if the form contains file inputs
     * @var bool
     */
    protected $hasFiles = false;

    /**
     * Determines what method browser should use to send inputs
     * @var string
     */
    protected $method = 'POST';

    /**
     * List of inputs within the form
     * @var array
     */
    protected $inputs = [];

    /**
     * @var string
     */
    protected $formId = '';

    /**
     * Callback to be implemented in extending classes
     * It is called in the constructor so each extending class can create it's inputs
     * @return mixed
     */
    abstract protected function createInputs();

    /**
     * Get the URL where the data will be sent
     * @return string
     */
    abstract public function getAction() : string;

    /**
     * Form constructor.
     * @param string $method
     * @param string $title
     * @param bool $withFiles
     * @param string $charset
     * @throws \Exception
     */
    public function __construct(string $title = '', string $method = '', bool $withFiles = false, string $charset = 'UTF-8')
    {
        $this->setMethod($method);
        $this->setTitle($title);

        $formTag = new HtmlForm($this->getAction(), $this->getMethod());

        $formTag->acceptCharset($charset);

        if ($withFiles) {
            $formTag->enctype(HtmlForm::ENCTYPE_MULTIPART);
        }
        else {
            $formTag->enctype(HtmlForm::ENCTYPE_URLENCODED);
        }

        $this->formId = $this->getTitle(true) . '-' . Str::random(5);

        $formTag->setHtmlAttribute('id', $this->getFormId());

        $this->html = new Markup([
            'form' => $formTag
        ]);

        static::createInputs();
    }

    /**
     * @return string
     */
    public function getFormId() : string
    {
        return $this->formId;
    }

    /**
     * @param string $formId
     */
    public function setFormId(string $formId) : void
    {
        $this->formId = $formId;
    }

    /**
     * Set the HTTP method to use
     * Automatically add spoofed method input if necessary
     * @param string $method
     * @throws \Exception
     */
    public function setMethod(string $method = '')
    {
        if (empty($method)) {
            return;
        }

        $method = strtoupper($method);

        $this->method = $method;
    }

    /**
     * Get the method used to sent data via HTTP
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the human readable title for the form
     * Automatically create machine name (slug)
     * @param string $title
     */
    public function setTitle(string $title = '')
    {
        if (empty($title)) {
            return;
        }

        $this->title = $title;
        $this->slug = Str::slugify($title);
    }

    /**
     * Get the title or the slug of the form
     * @param bool $slugified
     * @return string
     */
    public function getTitle($slugified = false)
    {
        if ($slugified) {
            return $this->slug;
        }

        return $this->title;
    }

    /**
     * @param Element $input
     */
    public function addInput(Element $input)
    {
        $this->inputs[$input->getName()] = $input;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function getInput(string $name)
    {
        if (isset($this->inputs[$name])) {
            return $this->inputs[$name];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getAllInputs()
    {
        return $this->inputs;
    }

    /**
     * @return array
     */
    public function getInputNames()
    {
        return array_keys($this->inputs);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = [];

        foreach($this->inputs as $name => $input) {
            $array[$name] = $input->getValue();
        }

        return $array;
    }

    /**
     * @param array $data
     * @return Form
     * @throws \Exception
     */
    public static function createFromArray(array $data)
    {
        $form = new static();

        $form->fillFromArray($data);

        return $form;
    }

    /**
     * @param array $data
     */
    public function fillFromArray(array $data)
    {
        foreach($this->inputs as $name => $input) {
            if (array_key_exists($name, $data)) {
                if (! is_array($data[$name])) {
                    $input->setValue($data[$name]);
                }
            }
        }
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $this->getHtml()
            ->getElement('form')
            ->setContents($this->getAllInputs());

        return (string) $this->getHtml();
    }

    /**
     * @return string
     */
    public function open() : string
    {
        return $this->getHtml()
            ->getElement('form')
            ->open();
    }

    /**
     * @return string
     */
    public function close() : string
    {
        return $this->getHtml()
            ->getElement('form')
            ->close();
    }
}