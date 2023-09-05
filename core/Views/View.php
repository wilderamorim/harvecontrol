<?php

namespace Core\Views;

use League\Plates\Engine;

class View
{
    private Engine $engine;

    public function __construct(array $data = [])
    {
        $this->engine = new Engine(config('view.path'));
        $this->engine->addData($data);
        $this->registerExtensions();
    }

    public function render(string $name, array $data = []): string
    {
        return $this->engine->render($name, $data);
    }

    protected function registerExtensions(): void
    {
        $extensions = config('view.extensions');
        array_walk($extensions, fn(string $className): Engine => $this->engine->loadExtension(new $className));
    }
}