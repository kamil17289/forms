<?php

namespace Nethead\Forms\Commons;

trait IsMutable {
    public static $mutators = [];

    public static function setMutator(callable $mutator)
    {
        self::$mutators[] = $mutator;
    }

    public function mutate()
    {
        foreach(self::$mutators as $mutator) {
            call_user_func($mutator, $this);
        }
    }
}