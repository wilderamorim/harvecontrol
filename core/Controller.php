<?php

namespace Core;

use Core\Views\View;
use Laminas\Diactoros\Response;

abstract class Controller
{
    protected Response $response;
    protected View $view;

    public function __construct(array $data = [])
    {
        $this->response = new Response();
        $this->view = new View(array_merge([
            'title' => config('app.name'),
        ], $data));
    }

    protected function view(string $name, array $data = []): Response
    {
        $view = $this->view->render($name, $data);
        $this->response->getBody()->write($view);
        return $this->response;
    }
}