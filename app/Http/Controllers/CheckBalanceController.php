<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckBalanceController extends Controller
{
    protected $guzzleService;

    public function __construct(GuzzleService $guzzleService)
    {
        $this->guzzleService = $guzzleService;
    }

    public function checkBalance(Request $request)
    {
        // Lógica para verificar o saldo

        // Exemplo de requisição para obter o saldo do usuário
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserBalances";

        // Ajuste o corpo conforme necessário
        $body = '{}';

        // Faça a requisição usando o GuzzleService
        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body);

        // Obtenha o conteúdo da resposta
        $content = $response->getBody()->getContents();

        // Retorne a resposta como JSON
        return response()->json(['result' => $content]);
    }
}




