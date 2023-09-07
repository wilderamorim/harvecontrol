<?php

namespace Core\Views\Strategies;

use eftec\bladeone\BladeOne;

class BladeOneTemplateStrategy implements TemplateStrategyInterface
{
    private BladeOne $template;

    public function __construct(array $data = [])
    {
        $this->template = new BladeOne(config('view.path'), $this->getCompilationCachePath(), $this->getBladeCompilationMode());
        $this->configureTemplate($data);
        $this->registerExtensions();
    }

    public function render(string $name, array $data = []): string
    {
        return $this->template->run(str_replace('/', '.', $name), $data);
    }

    public function registerExtensions(): void
    {
        $extensionClasses = config('view.templates.blade.extensions');;
        array_walk($extensionClasses, [$this, 'registerMethodsForExtension']);
    }

    protected function configureTemplate(array $data): void
    {
        $this->template->pipeEnable = true;
        $this->template->setBaseUrl(config('app.url'));
        $this->template->share($data);
    }

    protected function registerMethodsForExtension(string $extensionClass): void
    {
        $reflection = new \ReflectionClass($extensionClass);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_STATIC);

        foreach ($methods as $method) {
            if ($method->class !== $extensionClass) {
                continue;
            }
            $this->registerDirective($extensionClass, $method);
        }
    }

    protected function registerDirective(string $extensionClass, \ReflectionMethod $method): void
    {
        $this->template->directive(
            $method->name,
            fn(string $expression): string => "<?php echo $extensionClass::$method->name($expression); ?>"
        );
    }

    protected function getCompilationCachePath(): string
    {
        $cachePath = config('view.templates.blade.compilation_cache');
        if (!is_dir($cachePath)) {
            mkdir($cachePath, 0777, true);
        }

        return $cachePath;
    }

    protected function getBladeCompilationMode(): int
    {
        return is_production() ? BladeOne::MODE_AUTO : BladeOne::MODE_DEBUG;
    }
}
