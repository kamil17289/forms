<?php

namespace Nethead\Forms;

use Nethead\Forms\Helpers\Str;
use Nethead\Markup\Html\HasHtmlAttributes;

/**
 * Class Form
 * @package Nethead\Forms
 */
abstract class Form {
    use HasHtmlAttributes;

    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    protected $slug = '';

    /**
     * @var bool
     */
    protected $hasFiles = false;

    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @var array
     */
    protected $spoofedMethods = [
        'PUT' => 'POST',
        'PATCH' => 'POST',
        'HEAD' => 'GET',
        'DELETE' => 'POST',
    ];

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @return mixed
     */
    abstract protected function createFields();

    /**
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
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method = '')
    {
        if (empty($method)) {
            return;
        }

        $method = strtoupper($method);

        if (array_key_exists($method, $this->spoofedMethods)) {
            $method = $this->spoofedMethods[$method];
        }

        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
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

    public function addField()
    {

    }

    public function getField()
    {

    }

    public function getAllFields()
    {

    }

    public function getFieldsNames()
    {

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