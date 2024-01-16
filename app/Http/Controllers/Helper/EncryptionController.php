<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;
use App\Models\Security\Encryption2;


class EncryptionController extends Controller{
    public function Encryption(){
        $encryption = new Encryption(); 

        $CNPJ=env('API_CNPJ');
        $ApiKey=env('API_KEY');

        
        if ($CNPJ === null) {
          throw new Exception('API_CNPJ not set in .env');
      }

      if ($ApiKey === null) {
          throw new Exception('API_KEY not set in .env');
      } 
        $ApiKey = str_replace( 'mfg','8', $ApiKey);
        $ApiKey = str_replace('pak', '9', $ApiKey);
        
      /*

        echo '<br><br>';
        echo "Mensagem CNPJ: " .$CNPJ;
        echo '<br><br>';
        echo "Mensagem API Key: ". $ApiKey;

        echo '<br>';
        echo '<br>'; 

       */
      
       return [
        'ApiKey' => $ApiKey,
        'CNPJ' => $CNPJ,
    ];
        
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