<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;



class CheckBalanceController extends Controller
{
   
    protected $guzzleService;
    protected $apiKey;
    protected $cnpj;
    protected $cpf; // Adicione a propriedade $cpf

    public function __construct(GuzzleService $guzzleService, EncryptionController $encryptionController)
    {
        $this->guzzleService = $guzzleService;

        // Chama o método Encryption para obter 'ApiKey' e 'CNPJ'
        $encryptionData = $encryptionController->Encryption();
        $this->apiKey = $encryptionData['ApiKey'];
        $this->cnpj = $encryptionData['CNPJ'];
        /*
        $this->cpf= session('cpf');

       

        dd($this->cpf= session('cpf'));
        */
        
    }

    public function checkBalance(Request $request)
    {
        // Pega CPF que está armazenado na Sessão
        $cpf= session('cpf');
        
    // Lógica para verificar o saldo

    // Exemplo de requisição para obter o saldo do usuário
    $apiUrl = "https://brasilbitcoin.com.br/caas/getUserBalances";

    // Ajuste o corpo conforme necessário
    $body = '{}';
   
    $headers = [
        'Authentication' => $this->apiKey,
        'BRBTC-FROM-ACCOUNT' => $cpf,
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

