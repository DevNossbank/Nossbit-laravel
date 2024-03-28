<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use App\Services\AuthenticationHeaderService;
use App\Services\GuzzleService;

class LiberarAcessoController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService; 

    public function __construct(GuzzleService $guzzleService,  AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
   
    }

    public function liberarAcesso(Request $request, $userId)
    {
    
    // Buscar o usuário com o ID fornecido
    $user = User::find($userId);
    //dd($userId);

    $apiUrl = "https://brasilbitcoin.com.br/caas/sandbox/createUserAccount";
    $headers = $this->authenticationHeaderService->getHeadersRegister();

    



   // dd($headers);
   // getHeadersRegister()
    // Verificar se o usuário foi encontrado
    if ($user) {
        // Faça o que for necessário com o usuário, por exemplo, exibindo informações
        $kyc = $user->status_kyc;
        if($kyc !== "LIBERADO"){

            try{

            $body = '{"documentNumber": '.$user->cpf.',  "name": "'.$user->name.'"}';
//dd($body);
            $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);
            //dd("OI");
            //var_dump($userId);
            //dd($user->name,$user->cpf);
            
            $user->status_kyc = "LIBERADO";
            $user->save();
            
            return redirect('admin/users')->with(['message' => 'Acesso liberado com sucesso', 'alert-type' => 'success']);
            }
            catch (Exception $e){
                return $e;
            }

        } 
        
    } else {
        // O usuário não foi encontrado, trate esse caso adequadamente
        // Por exemplo, pode retornar uma resposta HTTP adequada
        return response()->json(['message' => 'Usuário não encontrado'], 404);
    }
   // var_dump($userId); // Exibe o ID do usuário obtido da URL
}
}



