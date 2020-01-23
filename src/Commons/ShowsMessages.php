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
    public function getAllMessages()
    {
        return $this->messages;
    }

    /**
     * @param string $severity
     * @return array
     */
    public function getBySeverity(string $severity)
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
     * @param string $message
     */
    public function setError(string $message)
    {
        $this->addMessage($message, 'error');
    }

    /**
     * @param string $message
     */
    public function setWarning(string $message)
    {
        $this->addMessage($message, 'warning');
    }

    /**
     * @param string $message
     */
    public function setNotice(string $message)
    {
        $this->addMessage($message, 'notice');
    }

    /**
     * @param string $message
     */
    public function setInfo(string $message)
    {
        $this->addMessage($message, 'info');
    }
}