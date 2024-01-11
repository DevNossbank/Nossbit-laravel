<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Security\Encryption;
use Illuminate\Support\Facades\Hash;

class EncryptionController extends Controller{
    public function testEncryption(/*$mensagem*/){
        $encryption = new Encryption(); 

        $mensagemCNPJ=env('API_CNPJ');
        $mensagemApi=env('API_KEY');
        $mensagemApi = str_replace( 'mfg','8', $mensagemApi);
        $mensagemApi = str_replace('pak', '9', $mensagemApi);
        

 
        //$mensagemCNPJ = $mensagem
        echo '<br><br>';
        echo "Mensagem CNPJ: " .$mensagemCNPJ;
        echo '<br><br>';
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

       /*
        $valor_api="8AZwaFp98ZJ2tVv8AOs0DSKMdPjLMBvEgNEOD770mer1KycarOt9uOhLI9WYFb1v";
        $mensagemDecriptografada = $encryption->encrypt($mensagemApi);
        echo "Mensagem API: ".$mensagemDecriptografada;
        echo '</br></br>';
       
      */
      /*
        echo 'Mensagem DEScriptografada';
        echo '</br></br>';
        
        $mensagemDescriptografadaAPI = $encryption->decrypt($mensagemApi);
        echo "Mensagem API 2: ". $mensagemDescriptografadaAPI;
        echo '</br></br>';
        echo 'Mensagem criptografada';
        echo '</br></br>';
        */


/*
$stringOriginal = "dLAgiZvmP1oeYzQAUx+zOZ7eCN7x9Kkjfu5hQqGE8bCRzmYZhCs1JjKNpvvlClxaVQs38R5CgnAffCtMwnzF2tHNo+MfNXy6BAisOJQqAsee2JriFRxqEI+lXpCYgIwYgQJdkahyLM6Dm0Zi7VB2Y746AcqjVZw0vSSA4Bng16XO5AAS0b2EBT\/C9kXzvJfx9zsQ6A+7PQzi+y3e5HeMHFGV9yq5otwsO\/e4X1J8mnOL+R8r\/qvDYzjQP\/ijLG9PGOYhETy7VjvoKVu1\/A8X3Q==";

$stringSubstituida = str_replace('\\', 'gabilola', $stringOriginal);

echo $stringSubstituida;


*/




  
    }
}
?>