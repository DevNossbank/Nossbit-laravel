<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;

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
    $headers = [
        'Authentication' => "8AZwaFp98ZJ2tVv8AOs0DSKMdPjLMBvEgNEOD770mer1KycarOt9uOhLI9WYFb1v",
        'BRBTC-FROM-ACCOUNT' => "41693165848", // Certifique-se de ter o relacionamento correto entre usuário e CPF
        'Content-Type' => 'application/json',
    ];

    // Faça a requisição usando o GuzzleService com verificação SSL desativada
    $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

    // Obtenha o conteúdo da resposta
    $content = $response->getBody()->getContents();

    // Decodifique o conteúdo JSON
    $data = json_decode($content, true);

    // Verifique se a resposta foi bem-sucedida
    if ($data['success']) {
        // Se a resposta foi bem-sucedida, envie o saldo para a view
        $saldo = $data['data'];

        // Retorne a view com o saldo
        return view('site.wallet', compact('saldo'));
    } else {
        // Se houver um erro na resposta, retorne uma mensagem de erro ou trate conforme necessário
        return response()->json(['error' => 'Erro ao obter o saldo.']);
    }
    }
}

