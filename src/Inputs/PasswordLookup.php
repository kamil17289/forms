<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Structures\FormGroup;
use Nethead\Forms\Structures\Markup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Html\Button;
use Nethead\Markup\Html\Tag;

/**
 * Class PasswordLookup
 * @package Nethead\Forms\Inputs
 */
class PasswordLookup extends Password {
    /**
     * @var string
     */
    protected $lookupIcon = 'fas fa-eye';

    /**
     * PasswordLookup constructor.
     * @param string $name
     * @param string $label
     * @throws \Exception
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct($name, $label);

        $markup = new Markup([
            'input' => $this->getInput(),
            'toggle' => $this->getLookupButton(),
        ], 'div', ['class' => 'input-group']);

        $this->setHtml(new FormGroup([
            'label' => $this->getLabel(),
            'markup' => $markup,
            'messages' => new Messages($this->getAllMessages()),
        ]));
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        return (string) $this->getHtml()->render();
    }

    /**
     * @param string $icon
     */
    public function setLookupIcon(string $icon)
    {
        $this->lookupIcon = $icon;
    }

    /**
     * @return Tag
     */
    protected function getLookupButton()
    {
        return new Tag('span', ['class' => 'input-group-btn'], [
            new Button('button', '', ['class' => 'btn btn-secondary password-lookup'], [
                new Tag('i', ['class' => $this->lookupIcon])
            ])
        ]);
    }
}