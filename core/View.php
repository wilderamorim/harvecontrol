<?php

namespace Core;

use League\Plates\Engine;

class View
{
    private Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine(config('app.view_dir'));
        $this->engine->addData([
            'title' => config('app.name'),
        ]);
    }

    public function render(string $name, array $data = []): string
    {
        return $this->engine->render($name, $data);
    }
}