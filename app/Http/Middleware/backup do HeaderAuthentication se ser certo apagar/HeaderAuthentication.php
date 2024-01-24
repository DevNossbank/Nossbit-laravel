<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Helper\EncryptionController;

class HeaderAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    
    {

        // Chama a função Encryption do EncryptionController para obter o array associativo
        $encryptionController = new EncryptionController();
        $encryptionData = $encryptionController->Encryption();

        // Pega o valor da chave 'ApiKey' do array associativo
        $apiKey = $encryptionData['ApiKey'];

        $cpf = session('cpf');

        

        $headers = [
            'Authentication:' . $apiKey,
            'BRBTC-FROM-ACCOUNT:' . $cpf, // Certifique-se de ter o relacionamento correto entre usuário e CPF
            'Content-Type: application/json',
        ];
        

        $request->headers->add($headers);

        return $next($request);
    }
}



      

