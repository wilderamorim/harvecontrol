<?php

namespace Core;

use Laminas\Diactoros\Response;

class Controller
{
    protected Response $response;
    protected View $view;

    public function __construct()
    {
        $this->response = new Response();
        $this->view = new View();
    }

    protected function view(string $name, array $data = []): Response
    {
        $view = $this->view->render($name, $data);
        $this->response->getBody()->write($view);
        return $this->response;
    }
}