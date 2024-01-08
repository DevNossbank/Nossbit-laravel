<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;

class EncryptionController extends Controller{

    public function testEncryption(){
        $encryption = new Encryption();

        $mensagemOriginal = "Mensagem secreta";

        // Criptografar a mensagem
        $mensagemCriptografada = $encryption->encrypt($mensagemOriginal);
        echo "Mensagem Criptografada: " . $mensagemCriptografada . "<br>";

        // Descriptografar a mensagem
        $mensagemDescriptografada = $encryption->decrypt(json_decode($mensagemCriptografada)->Data->Json);
        echo "Mensagem Descriptografada: " . $mensagemDescriptografada;
  
    }

}

?>