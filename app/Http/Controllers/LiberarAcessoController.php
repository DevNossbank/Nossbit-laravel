<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class LiberarAcessoController extends Controller
{
    public function liberarAcesso(Request $request, $userId)
{
    // Buscar o usuário com o ID fornecido
    $user = User::find($userId);

    // Verificar se o usuário foi encontrado
    if ($user) {
        // Faça o que for necessário com o usuário, por exemplo, exibindo informações
        $kyc = $user->status_kyc;
        if($kyc==null){
            //dd("Ele é Nulo");
            
            $user->status_kyc = "LIBERADO";
            $user->save();
            
            return redirect('admin/users')->with(['message' => 'Acesso liberado com sucesso', 'alert-type' => 'success']);


        } 
        
    } else {
        // O usuário não foi encontrado, trate esse caso adequadamente
        // Por exemplo, pode retornar uma resposta HTTP adequada
        return response()->json(['message' => 'Usuário não encontrado'], 404);
    }
   // var_dump($userId); // Exibe o ID do usuário obtido da URL
}
}



