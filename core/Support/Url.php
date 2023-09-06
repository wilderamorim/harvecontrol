<?php

namespace Core\Support;

use Core\Views\AbstractExtension;

class Url extends AbstractExtension
{
    /**
     * Generate a URL based on the APP_URL with an optional resource path.
     *
     * @param string|null $resource The optional resource path to append to the URL.
     * @return string The generated URL.
     */
    public static function url(?string $resource = null): string
    {
        $url = config('app.url');
        if ($resource !== null) {
            $resource = '/' . ltrim($resource, '/');
            $url .= $resource;
        }
        return $url;
    }

    /**
     * Generate an asset URL with a version query parameter based on file modification time.
     *
     * @param string $path The path to the asset file relative to the assets directory.
     * @return string The asset URL with the version query parameter.
     */
    public static function asset(string $path): string
    {
        $assetsDir = config('app.assets_dir');
        $filePath = $assetsDir . DIRECTORY_SEPARATOR . (str_starts_with($path, '/') ? ltrim($path, '/') : $path);
        if (file_exists($filePath)) {
            $path .= '?v=' . filemtime($filePath);
        }

        return $path;
    }
}