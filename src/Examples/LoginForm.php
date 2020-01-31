<?php

namespace Nethead\Forms\Examples;

use Nethead\Forms\Controls\Submit;
use Nethead\Forms\Form;
use Nethead\Forms\Inputs\BooleanCheckbox;
use Nethead\Forms\Inputs\Password;
use Nethead\Forms\Inputs\Text;

/**
 * Class LoginForm
 * @package Nethead\Forms\Examples
 */
class LoginForm extends Form {
    /**
     * @return string
     */
    public function getAction(): string
    {
        return '/forms';
    }

    /**
     * @return mixed|void
     * @throws \Exception
     */
    public function createInputs()
    {
        $this->addInput(new Text('username', 'Login'));
        $this->addInput(new Password('password', 'Password'));
        $this->addInput(new Password('password_confirm', 'Re-type password'));
        $this->addInput(new BooleanCheckbox('remember_me', 'Keep me logged in', 0));
        $this->addInput(new Submit('submit', 'Enter'));
    }
}