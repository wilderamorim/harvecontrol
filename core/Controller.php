<?php

namespace Core;

use Core\Views\Strategies\TemplateStrategyInterface;
use Laminas\Diactoros\Response;

abstract class Controller
{
    protected Response $response;
    protected TemplateStrategyInterface $view;

    public function __construct(array $data = [])
    {
        $this->response = new Response();

        $template = config(sprintf('view.templates.%s.engine', config('view.current')));
        $this->view = new $template(array_merge([
            'title' => config('app.name'),
        ], $data));
    }

    protected function view(string $name, array $data = []): Response
    {
        $view = $this->view->render(str_replace('.', '/', $name), $data);
        $this->response->getBody()->write($view);
        return $this->response;
    }
}