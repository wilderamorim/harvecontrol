<?php

return [
    'path' => __DIR__ . '/../resources',
    'extensions' => [
        new League\Plates\Extension\URI($_SERVER['REQUEST_URI']),
        new League\Plates\Extension\Asset(config('app.assets_dir'), true),
        \Core\Support\Str::class,
    ],
];
