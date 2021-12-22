<?php

namespace Nethead\Forms\Forms;

use Nethead\Forms\Abstracts\Form;
use Nethead\Forms\Inputs\Checkbox;
use Nethead\Forms\Inputs\Password;
use Nethead\Forms\Inputs\Submit;
use Nethead\Forms\Inputs\Text;

/**
 * Class ExampleLoginForm
 * @package Nethead\Forms\Forms
 */
class ExampleLoginForm extends Form {
    /**
     * ExampleLoginForm constructor.
     * @param string $method
     * @param bool $hasFiles
     * @param string $charset
     */
    public function __construct(string $method = 'POST', bool $hasFiles = false, string $charset = 'UTF-8')
    {
        $this->setFormId('login-form');

        parent::__construct($method, $hasFiles, $charset);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return '/';
    }

    /**
     * @inheritDoc
     */
    protected function createInputs(): void
    {
        $this->addElement(new Text('username', '', '', 'Username'));
        $this->addElement(new Password('password', 'Password'));
        $this->addElement(new Checkbox('remember_me', false, true, 'Remember me'));
        $this->addElement(new Submit('submit', 'Login'));
    }
}