<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;


class EncryptionController extends Controller{

  /*
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
        
       return [
        'ApiKey' => $ApiKey,
        'CNPJ' => $CNPJ,
    ];
        
    }
  */
    
    public function Encryption(){

      $encription = new Encryption();

      $CNPJ_amb=env('API_CNPJ');
      $ApiKey=env('API_KEY');

      if ($CNPJ === null) {
          throw new Exception('API_CNPJ not set in .env');
      }

      if ($ApiKey === null) {
          throw new Exception('API_KEY not set in .env');
      } 

      $ApiKey = str_replace( 'mfg','8', $ApiKey);
      $ApiKey = str_replace('pak', '9', $ApiKey);

      $CNPJ = $encription2->decrypt($CNPJ_amb);

      return [
        'ApiKey' => $ApiKey,
        'CNPJ' => $CNPJ,
    ];

  }
}
?>