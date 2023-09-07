<?php

return [
    'path' => __DIR__ . '/../resources',
    'current' => env('TEMPLATE_DEFAULT_ENGINE', 'plates'),
    'templates' => [
        'twig' => [
            'engine' => \Core\Views\Strategies\TwigTemplateStrategy::class,
            'compilation_cache' => __DIR__ . '/../storage/framework/cache',
            'extensions' => [
                \Core\Support\Str::class,
                \Core\Support\Url::class,
            ],
        ],
        'plates' => [
            'engine' => \Core\Views\Strategies\PlatesTemplateStrategy::class,
            'extensions' => [
                \Core\Support\Str::class,
                \Core\Support\Url::class,

                new League\Plates\Extension\URI($_SERVER['REQUEST_URI']),
                new League\Plates\Extension\Asset(config('app.assets_dir'), true),
            ],
        ],
        'blade' => [
            'engine' => \Core\Views\Strategies\BladeOneTemplateStrategy::class,
            'compilation_cache' => __DIR__ . '/../storage/framework/cache',
            'extensions' => [
                \Core\Support\Str::class,
                \Core\Support\Url::class,
            ],
        ],
    ],
];
