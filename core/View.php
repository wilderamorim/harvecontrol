<?php

namespace Core;

use League\Plates\Engine;

class View
{
    private Engine $engine;

    public function __construct(array $data = [])
    {
        $this->engine = new Engine(config('app.view_dir'));
        $this->engine->addData($data);
    }

    public function render(string $name, array $data = []): string
    {
        return $this->engine->render($name, $data);
    }
}