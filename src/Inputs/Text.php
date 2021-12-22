<?php

namespace Nethead\Forms\Inputs;

use Nethead\Forms\Abstracts\Input;

/**
 * Class Text
 * @package Nethead\Forms\Inputs
 */
class Text extends Input {
    /**
     * @var int
     */
    protected $size = 30;

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return 'text';
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        if ($size > 0) {
            $this->size = $size;
        }
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}