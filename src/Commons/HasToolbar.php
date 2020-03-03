<?php

namespace Nethead\Forms\Commons;

use Nethead\Forms\Structures\Toolbar;

/**
 * Trait HasToolbar
 * @package Nethead\Forms\Commons
 */
trait HasToolbar {
    /**
     * @return array
     */
    public function getButtons()
    {
        return [
            'submit',
            'reset',
        ];
    }

    /**
     * @return string
     */
    public function renderToolbar()
    {
        $toolbar = new Toolbar($this->getFormId() . '-toolbar');

        foreach($this->getButtons() as $type) {
            $button = $this->renderButton($type);

            if ($button) {
                $button->getHtml()
                    ->getElement('button')
                    ->setHtmlAttribute('form', $this->getFormId());

                $toolbar->addElement($type, $button);
            }
        }

        return (string) $toolbar;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function renderButton(string $type)
    {
        $buttons = $this->getButtons();

        if (in_array($type, $buttons)) {
            $method = 'get' . ucfirst($type) . 'Button';

            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }

        return false;
    }
}