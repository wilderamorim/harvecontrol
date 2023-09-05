<?php

namespace Core\Views;

use League\Plates\Engine;

trait ExtensionTrait
{
    public function register(Engine $engine): void
    {
        $functionName = lcfirst(basename(str_replace('\\', '/', get_class($this))));
        $engine->registerFunction($functionName, fn() => $this);
    }
}