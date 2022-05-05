<?php

namespace Nethead\Forms\Renderers;

use Nethead\Forms\Abstracts\DataField;
use Nethead\Forms\Abstracts\Element;
use Nethead\Markup\Foundation\Fragment;
use Nethead\Markup\Foundation\Tag;

class Messages extends Renderer {
    /**
     * @var array
     */
    public static $options = [
        'wrapper' => 'div',
        'wrapperAttributes' => [],
        'messageContainer' => 'div',
        'messageContainerAttributes' => []
    ];

    /**
     * @param Fragment $fragment
     * @param Element|null $element
     * @param array $options
     * @return void
     */
    public static function render(Fragment $fragment, Element $element = null, array $options = [])
    {
        if ($element instanceof DataField && $element->hasMessages()) {
            $options = parent::options($options, 'messages');
            $messages = [];

            foreach($element->getAllMessages() as $message) {
                $messages[] = self::message($message, $options);
            }

            $messageWrapper = new Tag($options['wrapper'], $options['wrapperAttributes'], $messages);

            $fragment->push('messages', $messageWrapper);
        }
    }

    /**
     * @param array $message
     * @param array $options
     * @return Tag
     */
    public static function message(array $message, array $options): Tag
    {
        $tag = new Tag($options['messageContainer'], [
            'class' => $message['severity']
        ], [$message['message']]);

        $tag->attrs()->setMany($options['messageContainerAttributes']);

        return $tag;
    }
}