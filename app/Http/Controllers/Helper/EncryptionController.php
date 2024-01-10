<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;

class EncryptionController extends Controller{
    public function testEncryption(/*$mensagem*/){
        $encryption = new Encryption(); 

        $mensagemOriginal=env('API_CNPJ');
        $mensagemApi=env('API_KEY');

 
        //$mensagemOriginal = $mensagem
        echo $mensagemOriginal;

        echo '<br>';
        // Criptografar a mensagem
        /*$mensagemCriptografada = $encryption->encrypt($mensagemOriginal);
        echo "Mensagem Criptografada: " . $mensagemCriptografada . "<br>"; */

        // Descriptografar a mensagem
        $mensagemDescriptografada = $encryption->decrypt($mensagemOriginal);
        echo "Mensagem Descriptografada: " . $mensagemDescriptografada;

        $mensagemDescriptografadaAPI = $encryption->decrypt($mensagemApi);
        echo "Mensagem Descriptografada: " . $mensagemDescriptografadaAPI;
  
    }
}
?>