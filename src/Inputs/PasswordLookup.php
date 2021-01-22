<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;
use Nethead\Forms\Structures\Markup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Tags\Button;
use Nethead\Markup\Foundation\Tag;

/**
 * Class PasswordLookup
 * @package Nethead\Forms\Inputs
 */
class PasswordLookup extends Password {
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
     * @return Tag
     */
    protected function getLookupButton(): Tag
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

    /**
     * @param string $value
     */
    public function forceValue(string $value)
    {
        $this->setValue($value);

        $this->updateHtmlRepresentation('markup.input', [
            'value' => $value
        ]);
    }
}