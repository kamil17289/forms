<?php

namespace Nethead\Forms;

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
    public $slug;

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

    public function __construct(string $method = '', string $title = '')
    {
        $this->setMethod($method);
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
     * @param string $title
     */
    public function setTitle(string $title = '')
    {
        if (empty($title)) {
            return;
        }

        $this->title = $title;
    }
}