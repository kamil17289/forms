<?php

namespace Nethead\Forms\Integrations\Laravel;

use Nethead\Forms\Form;
use Nethead\Forms\Inputs\Hidden;

abstract class LaravelForm extends Form {
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
     * LaravelForm constructor.
     * @param string $title
     * @param string $method
     * @param bool $withFiles
     * @param string $charset
     * @throws \Exception
     */
    public function __construct(string $title = '', string $method = '', bool $withFiles = false, string $charset = 'UTF-8')
    {
        parent::__construct($title, $method, $withFiles, $charset);

        if (array_key_exists($this->method, $this->spoofedMethods)) {
            $this->addSpoofedMethodInput($this->method);

            $this->method = $this->spoofedMethods[$this->method];
        }

        $this->addCSRFToken();
    }

    /**
     * @param string $method
     * @throws \Exception
     */
    protected function addSpoofedMethodInput(string $method)
    {
        $this->addInput(new Hidden('_method', $method));
    }

    /**
     * @throws \Exception
     */
    protected function addCSRFToken()
    {
        $this->addInput(new Hidden('_token', csrf_token()));
    }
}