<?php

namespace Core\Views\Strategies;

use League\Plates\Engine;

class PlatesTemplateStrategy implements TemplateStrategyInterface
{
    private Engine $template;

    public function __construct(array $data = [])
    {
        $this->template = new Engine(config('view.path'));
        $this->template->addData($data);
        $this->registerExtensions();
    }

    public function render(string $name, array $data = []):string
    {
        return $this->template->render($name, $data);
    }

    public function registerExtensions(): void
    {
        $extensions = config('view.templates.plates.extensions');
        array_walk(
            $extensions,
            fn(string|object $className): Engine => $this->template->loadExtension(
                is_string($className) ? new $className : $className
            )
        );
    }
}