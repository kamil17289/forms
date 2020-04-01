<?php

namespace Nethead\Forms\Commons;

/**
 * Trait IsMutable
 * @package Nethead\Forms\Commons
 */
trait IsMutable {
    /**
     * @var array
     */
    public static $mutators = [];

    /**
     * @param callable $mutator
     */
    public static function setMutator(callable $mutator)
    {
        $className = get_called_class();
        self::$mutators[$className][] = $mutator;
    }

    /**
     *
     */
    public function mutate()
    {
        foreach(self::$mutators as $className => $mutators) {
            if (is_a($this, $className)) {
                foreach($mutators as $mutator) {
                    call_user_func($mutator, $this);
                }
            }
        }
    }
}