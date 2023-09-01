<?php

namespace Core;

use League\Plates\Engine;

class View
{
    private $engine;

    public function __construct()
    {
        $this->engine = new Engine(config('app.view_dir'));
    }

    public function render(string $path, array $data = []): string
    {
        return $this->engine->render($path, $data);
    }
}