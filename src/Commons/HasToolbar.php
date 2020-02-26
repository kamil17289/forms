<?php

namespace Nethead\Forms\Commons;

use Nethead\Forms\Controls\Reset;
use Nethead\Forms\Controls\Submit;
use Nethead\Forms\Structures\Toolbar;

/**
 * Trait HasToolbar
 * @package Nethead\Forms\Commons
 */
trait HasToolbar {
    /**
     * @var array
     */
    public $buttons = [
        'submit' => Submit::class,
        'reset' => Reset::class,
    ];

    /**
     * @return string
     */
    public function renderToolbar()
    {
        $toolbar = new Toolbar();

        foreach($this->buttons as $type => $className) {
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
        if (isset($this->buttons[$type])) {
            $method = 'get' . ucfirst($type) . 'Button';

            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }

        return false;
    }
}