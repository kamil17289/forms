<?php

namespace Nethead\Forms\Examples;

use Nethead\Forms\Commons\HasToolbar;
use Nethead\Forms\Controls\Submit;
use Nethead\Forms\Form;
use Nethead\Forms\Inputs\Password;
use Nethead\Forms\Inputs\Text;

/**
 * Class LoginForm
 * @package Nethead\Forms\Examples
 */
class UserEditForm extends Form {
    use HasToolbar;

    /**
     * @return string
     */
    public function getAction(): string
    {
        return '/user/1/update';
    }

    /**
     * @return mixed|void
     * @throws \Exception
     */
    public function createInputs()
    {
        $this->addInput(new Text('username', 'Login'));
        $this->addInput(new Password('password', 'Password'));
    }

    public function getSubmitButton()
    {
        return new Submit('submit', 'Enter');
    }
}