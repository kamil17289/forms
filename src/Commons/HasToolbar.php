<?php

namespace Nethead\Forms\Commons;

use Nethead\Forms\Abstracts\Control;
use Nethead\Forms\Structures\Toolbar;

/**
 * Trait HasToolbar
 * @package Nethead\Forms\Commons
 */
trait HasToolbar {
    /**
     * @return array
     */
    public function getButtons(): array
    {
        return [
            'submit',
            'reset',
        ];
    }

    /**
     * @return string
     */
    public function renderToolbar(): string
    {
        $toolbar = new Toolbar($this->getFormId() . '-toolbar');

        foreach($this->getButtons() as $type) {
            $button = $this->renderButton($type);

            if ($button) {
                $button->getHtml()
                    ->getElement('button')
                    ->attrs()->set('form', $this->getFormId());

                $toolbar->addElement($type, $button);
            }
        }

        return (string) $toolbar;
    }

    /**
     * @param string $type
     * @return Control|null
     */
    public function renderButton(string $type): ?Control
    {
        $buttons = $this->getButtons();

        if (in_array($type, $buttons)) {
            $method = 'get' . ucfirst($type) . 'Button';

            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }

        return null;
    }
}