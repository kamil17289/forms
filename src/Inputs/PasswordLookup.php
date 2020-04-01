<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
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
    }

    /**
     * @return array
     */
    protected function getFieldset() : array
    {
        $inputElement = parent::getInputElement();

        $markup = new Markup([
            'input' => $inputElement,
            'toggle' => $this->getLookupButton(),
        ], 'div', ['class' => 'input-group']);

        return [
            'label' => $this->getLabel(),
            'markup' => $markup,
            'messages' => new Messages($this->getAllMessages())
        ];
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

    /**
     *
     */
    public function getMutableElement() : Tag
    {
        return $this->getHtml()
            ->getElement('markup')
            ->getElement('input');
    }
}