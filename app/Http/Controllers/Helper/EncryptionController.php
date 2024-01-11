<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;
use App\Models\Security\Encryption2;


class EncryptionController extends Controller{
    public function testEncryption(){
        $encryption = new Encryption(); 

        $mensagemCNPJ=env('API_CNPJ');
        $mensagemApi=env('API_KEY');
        $mensagemApi = str_replace( 'mfg','8', $mensagemApi);
        $mensagemApi = str_replace('pak', '9', $mensagemApi);
        

        echo '<br><br>';
        echo "Mensagem CNPJ: " .$mensagemCNPJ;
        echo '<br><br>';
        echo "Mensagem API: ". $mensagemApi;

        echo '<br>';
        echo '<br>'; 
    }

    public function variableEncryption(){

      $encription2 = new Encryption2();

      $businessData=env('API_CNPJ');
      $mensagemKey=env('API_KEY');
      $mensagemKey = str_replace( 'mfg','8', $mensagemKey);
      $mensagemKey = str_replace('pak', '9', $mensagemKey);

      $testeBusiness = $encription2->decrypt($businessData);


      $businessInfo = array($testeBusiness, $mensagemKey);

      $string_resultante = implode(', ', $businessInfo);

      echo $string_resultante;
      

      return $businessInfo;
  }
}
?>