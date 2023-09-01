<?php

namespace App\Controllers;

use Core\Controller;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index(): ResponseInterface
    {
        // Consultar o nosso banco de dados
        // Obter os resultatos
        // Mandar pra a view para renderizar

        return $this->render('app', ['title' => 'HarveControl']);
    }
}