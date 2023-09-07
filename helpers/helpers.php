<?php

if (!function_exists('config')) {
    function config(string $path, string $separator = '.')
    {
        $explode = explode($separator, $path);
        $fileName = $explode[0];

        if (!file_exists($config = __DIR__ . '/../config/' . $fileName . '.php')) {
            return null;
        }

        array_shift($explode);

        $file = dot(require $config);

        if (empty($explode)) {
            return $file->all();
        }

        return dot(require $config)->get(implode($separator, $explode));
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return $_ENV[$key] ?? ($default ?? null);
    }
}

if (!function_exists('is_production')) {
    function is_production(): bool
    {
        return config('app.env') === 'production';
    }
}