<?php

namespace App\Controllers;

use Core\Controller;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index(): ResponseInterface
    {
        try {
            $db = \Core\Database\Connection::instance();
            $query = "SELECT * FROM users";
            $statement = $db->query($query);
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            dd($results);
        } catch (\Core\Database\Exceptions\DatabaseConnectionException $e) {
            echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
        }

        $invoices = [
            (object)[
                'kind' => 'income',
                'amount' => 'R$ 1.200,00',
                'description' => 'Desenvolvimento de Website',
                'due_date' => '30/08/2023',
            ],
            (object)[
                'kind' => 'expense',
                'amount' => 'R$ 90,00',
                'description' => 'Energia Elétrica',
                'due_date' => '30/08/2023',
            ],
        ];

        return $this->view('app', compact('invoices'));
    }
}