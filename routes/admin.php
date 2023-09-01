<?php

$router->map('GET', '/admin', function (): \Psr\Http\Message\ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write('<h1>Aqui vem o Painel Administrativo!</h1>');
    return $response;
});