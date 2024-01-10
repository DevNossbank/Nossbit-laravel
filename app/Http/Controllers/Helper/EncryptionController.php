<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;

class EncryptionController extends Controller{
    public function testEncryption(/*$mensagem*/){
        $encryption = new Encryption(); 

        $mensagemCNPJ=env('API_CNPJ');
        $mensagemApi=env('API_KEY');

 
        //$mensagemCNPJ = $mensagem
        echo "Mensagem CNPJ: " .$mensagemCNPJ;
        echo '<br>';
        echo "Mensagem API: ". $mensagemApi;

        echo '<br>';
        echo '<br>';
        // Criptografar a mensagem
        /*$mensagemCriptografada = $encryption->encrypt($mensagemCNPJ);
        echo "Mensagem Criptografada: " . $mensagemCriptografada . "<br>"; */

        // Descriptografar a mensagem
        /*
        $mensagemDescriptografada = $encryption->decrypt($mensagemCNPJ);
        echo "Mensagem CNPJ: " . $mensagemDescriptografada;
        echo"</br>";
        */
        $mensagemDescriptografadaAPI = $encryption->decrypt($mensagemApi);
        echo "Mensagem API: ". bin2hex($mensagemDescriptografadaAPI);
       var_dump($mensagemDescriptografadaAPI);
  
    }
}
?>