<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Message;

class EmailController extends Controller
{
    public function enviarEmail($data, $proofOfAddress,$photoProof)
    {
       // dd($data);
      // $dato=$data['name'];
       //$dato;
      // dd($photoProof);
        try {
            $recipientEmail = 'desenvolvimentonossbank@gmail.com';
    
            // Adicione um timestamp ao nome do arquivo
            $timestamp = now()->timestamp;
            $proofOfAddressFileName = "proof_of_address_{$timestamp}.{$proofOfAddress->getClientOriginalExtension()}";
    
            // Certifique-se de ter o caminho correto do arquivo proof_of_address
            $proofOfAddressPath = storage_path("app/public/uploads/{$proofOfAddressFileName}");
            //dd($proofOfAddressPath);  // Adicione esta linha para verificar o caminho do arquivo
    
            // Salvar o arquivo na pasta de uploads
            $proofOfAddress->move(storage_path('app/public/uploads'), $proofOfAddressFileName);

             // Adicione um timestamp ao nome do arquivo do photo_proof
             $timestampPhoto = now()->timestamp;
             $photoProofFileName = "photo_proof_{$timestampPhoto}.{$photoProof->getClientOriginalExtension()}";
             $photoProofPath = storage_path("app/public/uploads/{$photoProofFileName}");
 
             // Salvar o arquivo na pasta de uploads para photo_proof
             $photoProof->move(storage_path('app/public/uploads'), $photoProofFileName);
  
            // Verifique se o arquivo existe antes de tentar anexá-lo
            if (file_exists($proofOfAddressPath)) {

                Mail::raw("Cadastro de usuários no site.\n Nome: {$data['name']}\n, CPF: {$data['cpf']}\n, Email: {$data['email']}", function ($message) use ($proofOfAddressPath, $recipientEmail, $proofOfAddressFileName, $photoProofPath, $photoProofFileName) {
                    $message->to($recipientEmail, 'Marcos Flor')
                        ->subject('Cadastro de usuário Nossbit - nome do usuário')
                        ->attach($proofOfAddressPath, [
                            'as' => $proofOfAddressFileName,
                            'mime' => mime_content_type($proofOfAddressPath),
                        ]);
                
                    if (file_exists($photoProofPath)) {
                        $message->attach($photoProofPath, [
                            'as' => $photoProofFileName,
                            'mime' => mime_content_type($photoProofPath),
                        ]);
                    } else {
                        dd("Erro: Arquivo de comprovante de foto não encontrado.");
                    }
                });
    
                unlink($proofOfAddressPath);
                unlink($photoProofPath);

                return "E-mail de teste enviado para $recipientEmail.";
            } else {
                dd("Não encontrado");
                return "Erro: Arquivo de comprovante de endereço não encontrado.";
            }
        } catch (\Exception $e) {
            dd($e);
            return "Erro ao enviar e-mail de teste: " . $e->getMessage();
        }
    }
    
    

}






