<?php

// app/Services/AuthenticationHeaderService.php

namespace App\Services;

use App\Http\Controllers\Helper\EncryptionController;
use Illuminate\Support\Facades\Session;

class AuthenticationHeaderService
{
    protected $encryptionController;

    public function __construct(EncryptionController $encryptionController)
    {
        $this->encryptionController = $encryptionController;
    }

    public function getHeaders()
    {
        $encryptionData = $this->encryptionController->Encryption();
        $apiKey = $encryptionData['ApiKey'];
        $cnpj = $encryptionData['CNPJ'];

        $cpf = Session::get('cpf');

        return [
            'Authentication' => $apiKey,
            'BRBTC-FROM-ACCOUNT' => $cpf,
            'Content-Type' => 'application/json',
        ];
    }
}








