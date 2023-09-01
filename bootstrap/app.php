<?php

use League\Route\RouteGroup;

require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();

$router = new League\Route\Router;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router->group('', function (RouteGroup $router) {
    $folder = config('app.route_dir');
    $scandir = scandir($folder);

    $routeFiles = array_filter(array_map(function (string $item) use ($folder) {
        $fullPath = $folder . $item;

        if (!is_dir($fullPath) && is_file($fullPath) && pathinfo($fullPath, PATHINFO_EXTENSION) === 'php') {
            return $fullPath;
        }

        return null;
    }, $scandir));

    array_walk($routeFiles, function (string $fileToInclude) use ($router) {
        include $fileToInclude;
    });

});

return $router->dispatch($request);