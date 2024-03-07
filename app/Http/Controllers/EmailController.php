<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Message;

class EmailController extends Controller
{
    public function enviarEmailTeste($data, $proofOfAddress)
    {
        try {
            $recipientEmail = 'marcosgabrielmirandaflor@gmail.com';
    
            // Adicione um timestamp ao nome do arquivo
            $timestamp = now()->timestamp;
            $proofOfAddressFileName = "proof_of_address_{$timestamp}.{$proofOfAddress->getClientOriginalExtension()}";
    
            // Certifique-se de ter o caminho correto do arquivo proof_of_address
            $proofOfAddressPath = storage_path("app/public/uploads/{$proofOfAddressFileName}");
            //dd($proofOfAddressPath);  // Adicione esta linha para verificar o caminho do arquivo
    
            // Salvar o arquivo na pasta de uploads
            $proofOfAddress->move(storage_path('app/public/uploads'), $proofOfAddressFileName);
    
            // Verifique se o arquivo existe antes de tentar anexá-lo
            if (file_exists($proofOfAddressPath)) {
                Mail::send([], [], function (Message $message) use ($proofOfAddressPath, $recipientEmail, $proofOfAddressFileName) {
                    $message->to($recipientEmail, 'Marcos Flor')
                        ->subject('Cadastro de user 1')
                        ->attach($proofOfAddressPath, [
                            'as' => $proofOfAddressFileName,
                            'mime' => mime_content_type($proofOfAddressPath),
                        ]);
                });
    
                return "E-mail de teste enviado para $recipientEmail.";
            } else {
                return "Erro: Arquivo de comprovante de endereço não encontrado.";
            }
        } catch (\Exception $e) {
            dd($e);
            return "Erro ao enviar e-mail de teste: " . $e->getMessage();
        }
    }
    
    

}








