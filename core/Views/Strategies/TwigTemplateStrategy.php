<?php

namespace Core\Views\Strategies;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigTemplateStrategy implements TemplateStrategyInterface
{
    private Environment $template;

    public function __construct(array $data = [])
    {
        $loader = new FilesystemLoader(config('view.path'));
        $this->template = new Environment($loader, [
            'cache' => config('view.templates.twig.compilation_cache'),
            'debug' => config('app.env') === 'local',
        ]);
        array_walk($data, fn(string $value, string $key) => $this->template->addGlobal($key, $value));
        $this->registerExtensions();
    }

    public function render(string $name, array $data = []): string
    {
        return $this->template->render($name . '.twig', $data);
    }

    public function registerExtensions(): void
    {
        $extensions = config('view.templates.twig.extensions');
        array_walk(
            $extensions,
            fn(string $className) => $this->template->addExtension(new $className)
        );
    }
}