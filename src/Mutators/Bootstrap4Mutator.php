<?php

namespace Nethead\Forms\Mutators;

use Nethead\Forms\Abstracts\DataField;
use Nethead\Forms\Contracts\MutatorInterface;
use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Foundation\Tag;

/**
 * Class Bootstrap4Mutator
 * @package Nethead\Forms\Mutators
 */
class Bootstrap4Mutator implements MutatorInterface {
    /**
     * @var string[]
     */
    public $defaults = [
        'submit' => 'primary',
        'reset' => 'default',
        'button' => 'secondary',
        'buttonSize'  => '',
    ];

    /**
     * @var array|string[]
     */
    public $options = [];

    /**
     * Bootstrap4Mutator constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->defaults, $options);
    }

    /**
     * @param Element $element
     * @param Fragment $fragment
     */
    public function __invoke(Element $element, Fragment $fragment)
    {
        if ($fragment->has('input')) {
            $input = $fragment->get('input');
            $type = $input->attrs()->get('type');

            switch($type) {
                case 'radio':
                case 'checkbox':
                    $input->classList()->add('form-check-input');
                    break;

                case 'button':
                case 'reset':
                case 'submit':
                    $this->mutateButtons($input, $type);
                    break;

                default:
                    $input->classList()->add('form-control');
            }

            if ($element instanceof DataField) {
                if ($element->hasAny('warning') || $element->hasAny('error')) {
                    $input->classList()->add('is-invalid');
                }
                elseif ($element->hasAny('notice') || $element->hasAny('info')) {
                    $input->classList()->add('is-valid');
                }
            }
        }

        if ($fragment->has('button')) {
            $button = $fragment->get('button');

            $this->mutateButtons($button);
        }
    }

    /**
     * @param Fragment $fragment
     * @return Tag
     */
    public function wrapper_element(Fragment $fragment): Tag
    {
        return $fragment->wrap('div', ['class' => 'form-group']);
    }

    /**
     * @param Tag $btn
     * @param string $type
     */
    protected function mutateButtons(Tag $btn, string $type = 'button')
    {
        $btn->classList()->add(array_filter([
            'btn',
            'btn-' . $this->options[$type],
            $this->options['buttonSize']
        ]));
    }
}