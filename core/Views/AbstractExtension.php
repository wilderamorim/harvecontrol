<?php

namespace Core\Views;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Twig\Extension\AbstractExtension as AbstractExtensionAlias;
use Twig\TwigFunction;

abstract class AbstractExtension extends AbstractExtensionAlias implements ExtensionInterface
{
    public function register(Engine $engine): void
    {
        $functionName = lcfirst(basename(str_replace('\\', '/', get_class($this))));
        $engine->registerFunction($functionName, fn() => $this);
    }

    public function getFunctions(): array
    {
        $reflection = new \ReflectionClass($this);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_STATIC);

        $functions = [];
        foreach ($methods as $method) {
            if ($method->class === get_class($this) && $method->name !== __FUNCTION__) {
                $functions[] = new TwigFunction($method->name, [$this, $method->name]);
            }
        }

        return $functions;
    }
}