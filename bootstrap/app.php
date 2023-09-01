<?php

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$router = new League\Route\Router;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router->group('', function (\League\Route\RouteGroup $router) {
    $folder = config('app.route_dir');
    $scandir = scandir($folder);

    $routeFiles = array_filter(array_map(function ($item) use ($folder) {
        $fullPath = $folder . $item;

        if (!is_dir($fullPath) && is_file($fullPath)) {
            return $fullPath;
        }

    }, $scandir));

    array_walk($routeFiles, function ($fileToInclude) use ($router) {
        include $fileToInclude;
    });

});

return $router->dispatch($request);