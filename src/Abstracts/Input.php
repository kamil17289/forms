<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasLabel;
use Nethead\Forms\Commons\HasValue;
use Nethead\Forms\Commons\ShowsMessages;
use Nethead\Forms\Helpers\Str;
use Nethead\Markup\Commons\RendersIcons;

/**
 * Class Input
 * @package Nethead\Forms\Abstracts
 */
abstract class Input extends Element {
    use HasValue, RendersIcons, ShowsMessages, HasLabel;

    /**
     * Input constructor.
     * @param string $name
     * @param string $label
     * @param null $currentValue
     * @param string $defaultValue
     * @throws \Exception
     */
    public function __construct(string $name, string $label, $currentValue = null, $defaultValue = '')
    {
        parent::__construct($name);

        $this->setDefaultValue($defaultValue);
        $this->setValue($currentValue);

        $id = $this->generateID();

        $this->updateHtmlRepresentation([
            'id'    => $id,
            'name'  => $this->getName(),
            'value' => $this->getValue()
        ]);

        $this->setLabel($label, $id);
    }

    /**
     * @throws \Exception
     * @return string
     */
    protected function generateID()
    {
        return $this->getName() . '-' . Str::random(5);
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->getHtml()->getHtmlAttribute('id');
    }
}