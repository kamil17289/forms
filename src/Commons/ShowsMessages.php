<?php

namespace Nethead\Forms\Commons;

/**
 * Trait ShowsMessages
 * @package Nethead\Forms\Commons
 */
trait ShowsMessages {
    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @return array
     */
    public function getAllMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $severity
     * @return array
     */
    public function getMessagesBySeverity(string $severity): array
    {
        $found = [];

        foreach($this->messages as $index => $message) {
            if ($message['severity'] == $severity) {
                $found[] = $message;
            }
        }

        return $found;
    }

    /**
     * @param string $message
     * @param string $severity
     */
    public function addMessage(string $message, string $severity)
    {
        $this->messages[] = [
            'message' => $message,
            'severity' => $severity
        ];
    }

    /**
     * @return bool
     */
    public function hasMessages() : bool
    {
        return ! empty($this->messages);
    }

    /**
     * @param string $message
     */
    public function setErrorMessage(string $message)
    {
        $this->addMessage($message, 'error');
    }

    /**
     * @param string $message
     */
    public function setWarningMessage(string $message)
    {
        $this->addMessage($message, 'warning');
    }

    /**
     * @param string $message
     */
    public function setNoticeMessage(string $message)
    {
        $this->addMessage($message, 'notice');
    }

    /**
     * @param string $message
     */
    public function setInfoMessage(string $message)
    {
        $this->addMessage($message, 'info');
    }
}