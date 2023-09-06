<?php

namespace Core\Views\Strategies;

interface TemplateStrategyInterface
{
    public function render(string $name, array $data = []): string;

    public function registerExtensions(): void;
}