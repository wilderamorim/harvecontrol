<?php

namespace Core;

use Laminas\Diactoros\Response;

class Controller
{
    protected $response;
    protected $view;

    public function __construct()
    {
        $this->response = new Response();
        $this->view = new View();
    }

    protected function render(string $name, array $data = [])
    {
        $view = $this->view->render($name, $data);
        $this->response->getBody()->write($view);
        return $this->response;
    }
}