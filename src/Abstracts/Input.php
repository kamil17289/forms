<?php

namespace Nethead\Forms\Abstracts;

use Nethead\Forms\Commons\HasLabel;
use Nethead\Forms\Commons\HasValue;
use Nethead\Forms\Commons\ShowsMessages;
use Nethead\Forms\Integrations\Bootstrap\BootstrapFormGroupMutator;
use Nethead\Forms\Integrations\Bootstrap\BootstrapInputMutator;
use Nethead\Forms\Structures\Markup;
use Nethead\Forms\Structures\Messages;
use Nethead\Markup\Commons\RendersIcons;

/**
 * Class Input
 * @package Nethead\Forms\Abstracts
 */
abstract class Input extends Element {
    use HasValue, RendersIcons, ShowsMessages, HasLabel;

    /**
     * @var array
     */
    public static $mutators = [
        'inputs' => BootstrapInputMutator::class,
        'structures' => BootstrapFormGroupMutator::class,
        'controls' => null,
    ];

    /**
     * @var bool
     */
    protected static $mutatorsBooted = false;

    /**
     * @var string
     */
    public static $markup = Markup::class;

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

        $this->setLabel($label, $this->getID());

        if (! self::$mutatorsBooted) {
            self::bootMutators();
        }

        $markup = $this->getStructure();

        $markup->addElements($this->getFieldset());

        $this->setHtml($markup);
    }

    /**
     * Boot mutators
     */
    protected static function bootMutators()
    {
        foreach(self::$mutators as $element => $class) {
            if (is_string($class) && class_exists($class)) {
                self::$mutators[$element] = new $class();
            }
            else {
                self::$mutators[$element] = null;
            }
        }

        self::$mutatorsBooted = true;
    }

    /**
     * Create a structure for the input
     * @return Structure
     */
    protected function getStructure() : Structure
    {
        $structureClass = self::$markup;

        if (! class_exists($structureClass)) {
            throw new \RuntimeException('The markup class was not found.');
        }

        $structure = new $structureClass();

        if (! is_null(self::$mutators['structures'])) {
            $mutator = self::$mutators['structures'];

            $structure = $mutator($structure);
        }

        return $structure;
    }

    /**
     * Get array of elements for this input
     * @return array
     */
    protected function getFieldset() : array
    {
        $inputElement = static::getInputElement();

        if (! is_null(self::$mutators['inputs'])) {
            $mutator = self::$mutators['inputs'];

            $inputElement = $mutator($inputElement);
        }

        return [
            'label' => $this->getLabel(),
            'input' => $inputElement,
            'messages' => new Messages($this->getAllMessages())
        ];
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
     * @return mixed
     */
    abstract protected function getInputElement();
}