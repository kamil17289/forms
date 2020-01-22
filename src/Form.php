<?php

namespace Nethead\Forms;

use Nethead\Forms\Helpers\Str;
use Nethead\Markup\Html\Form as FormTag;

/**
 * Class Form
 * @package Nethead\Forms
 */
abstract class Form {
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
     * Select methods for the ones which are not permitted with web forms
     * @var array
     */
    protected $spoofedMethods = [
        'PUT' => 'POST',
        'PATCH' => 'POST',
        'HEAD' => 'GET',
        'DELETE' => 'POST',
    ];

    /**
     * List of inputs within the form
     * @var array
     */
    protected $inputs = [];

    protected $htmlTag = null;

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
     */
    public function __construct(string $method = '', string $title = '')
    {
        $this->setMethod($method);
        $this->setTitle($title);

        $this->htmlTag = new FormTag($this->getAction(), $this->getMethod());

        static::createInputs();
    }

    /**
     * Set the HTTP method to use
     * Automatically add spoofed method input if necessary
     * @param string $method
     */
    public function setMethod(string $method = '')
    {
        if (empty($method)) {
            return;
        }

        $method = strtoupper($method);

        if (array_key_exists($method, $this->spoofedMethods)) {
            $this->addSpoofedMethodInput($method);

            $method = $this->spoofedMethods[$method];
        }

        $this->method = $method;
    }

    /**
     * @param string $method
     */
    protected function addSpoofedMethodInput(string $method)
    {

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
     * @return FormTag|null
     */
    public function html()
    {
        return $this->htmlTag;
    }

    public function addInput()
    {

    }

    public function getInput(string $name)
    {
        if (isset($this->inputs[$name])) {
            return $this->inputs[$name];
        }

        return null;
    }

    public function getAllInputs()
    {
        return $this->inputs;
    }

    public function getInputNames()
    {
        return array_keys($this->inputs);
    }

    public function render() : string
    {

    }

    public function open() : string
    {

    }

    public function close() : string
    {

    }
}