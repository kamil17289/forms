<?php

namespace Nethead\Forms\Abstracts;

use RuntimeException;

/**
 * Class Element
 * The most basic element of the form.
 * @package Nethead\Forms\Abstracts
 */
abstract class Element {
    /**
     * The name of the Element.
     * @var string
     */
    protected $name;

    /**
     * Element ID that can be used to reference the element in HTML.
     * @var string
     */
    protected $id;

    /**
     * FormId which is assigned when the element is put inside the Form
     * @var string
     */
    protected $formId = '';

    /**
     * @var array
     */
    public static $pipeline = [];

    /**
     * @param array $options
     * @return mixed
     */
    abstract public function render(array $options = []);

    /**
     * Element constructor.
     * @param string $name Provide a name for a new element.
     * @param string $id Provide HTML ID for the new element or it will be generated randomly.
     */
    public function __construct(string $name, string $id = '')
    {
        $this->setName($name);
        $this->setId($id);
    }

    /**
     * Set Form to which this element belongs.
     * @param string $formId
     */
    public function setFormId(string $formId): void
    {
        $this->formId = $formId;
    }

    /**
     * Get ID of the form to which this element belongs.
     * @return string
     */
    public function getFormId(): string
    {
        return $this->formId;
    }

    /**
     * Set the name for the element.
     * @param string $name New name for the element.
     * @throws RuntimeException When the provided name is empty.
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new RuntimeException('Form element name must not be empty!');
        }

        $this->name = $name;
    }

    /**
     * Get name of this element.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set or generate id for the element.
     * @param string $id
     */
    public function setId(string $id = ''): void
    {
        if (empty($id)) {
            $id = sprintf('%s_%s', $this->name, Element::randomId());
        }

        $this->id = $id;
    }

    /**
     * Get id of this element.
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Generate simple id.
     * @return string
     */
    public static function randomId(): string
    {
        return substr(uniqid('', true), 9, 5);
    }
}