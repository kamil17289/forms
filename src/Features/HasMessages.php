<?php

namespace Nethead\Forms\Features;

/**
 * Trait HasMessages
 * Adds ability to hold messages of given severity.
 * @package Nethead\Forms\Features
 */
trait HasMessages {
    /**
     * @var array<string>
     */
    protected $messages = [];

    /**
     * Get all messages in array.
     * @return array
     */
    public function getAllMessages(): array
    {
        return $this->messages;
    }

    /**
     * Get the messages by severity.
     * @param string $severity
     * @return array
     */
    public function getMessagesBySeverity(string $severity): array
    {
        return array_filter($this->messages, function($value) use ($severity) {
            return $value['severity'] == $severity;
        });
    }

    /**
     * Add a message.
     * @param string $message
     * @param string $severity
     */
    public function addMessage(string $message, string $severity): void
    {
        $this->messages[] = [
            'message' => $message,
            'severity' => $severity
        ];
    }

    /**
     * Check if any messages has been set.
     * @return bool
     */
    public function hasMessages(): bool
    {
        return ! empty($this->messages);
    }

    /**
     * @param string $severity
     * @return bool
     */
    public function hasAny(string $severity): bool
    {
        return ! empty($this->getMessagesBySeverity($severity));
    }

    /**
     * Set a message with error severity.
     * @param string $message
     */
    public function setError(string $message): void
    {
        $this->addMessage($message, 'error');
    }

    /**
     * Set a message with warning severity.
     * @param string $message
     */
    public function setWarning(string $message): void
    {
        $this->addMessage($message, 'warning');
    }

    /**
     * Set a message with notice severity.
     * @param string $message
     */
    public function setNotice(string $message): void
    {
        $this->addMessage($message, 'notice');
    }

    /**
     * Set a message with info severity.
     * @param string $message
     */
    public function setInfo(string $message): void
    {
        $this->addMessage($message, 'info');
    }
}