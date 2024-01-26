<?php

// app/Services/AuthenticationHeaderService.php

namespace App\Services;

use App\Http\Controllers\Helper\EncryptionController;
use Illuminate\Support\Facades\Session;

class AuthenticationHeaderService
{
    protected $encryptionController;
    protected $apiKey;

    public function __construct(EncryptionController $encryptionController)
    {
        $this->encryptionController = $encryptionController;
        $this->apiKey = $encryptionController->Encryption()['ApiKey'];
    }

    public function getHeaders()
    {
        $encryptionData = $this->encryptionController->Encryption();
        $cpf = Session::get('cpf');

        return [
            'Authentication' => $this->apiKey,
            'BRBTC-FROM-ACCOUNT' => $cpf,
            'Content-Type' => 'application/json',
        ];
    }

    public function getHeadersRegister()
    {
        $encryptionData = $this->encryptionController->Encryption();
        $cnpj = $encryptionData['CNPJ'];

        return [
            'Authentication' => $this->apiKey,
            'BRBTC-FROM-ACCOUNT' => $cnpj,
            'Content-Type' => 'application/json',
        ];
    }
}








