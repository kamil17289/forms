<?php

namespace Nethead\Forms\Controls;

use Nethead\Forms\Abstracts\Element;

/**
 * Class Button
 * @package Nethead\Forms\Controls
 */
class Button extends Element {
    /**
     * @var string
     */
    protected $text = '';

    /**
     * @var string
     */
    protected $type = 'button';

    /**
     * Button constructor.
     * @param string $name
     * @param string $text
     * @param string $type
     * @param string $id
     */
    public function __construct(string $name, string $text, string $type = 'button', string $id = '')
    {
        parent::__construct($name, $id);

        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


}