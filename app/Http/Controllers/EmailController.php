<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Message;

class EmailController extends Controller
{
    public function enviarEmailTeste()
{
    try {
        $recipientEmail = 'marcosgabrielmirandaflor@gmail.com';

        // Certifique-se de ter o caminho correto do arquivo proof_of_address
        $proofOfAddressPath = storage_path('app/public/uploads/example.jpg');

        // Verifique se o arquivo existe antes de tentar anexá-lo
        if (file_exists($proofOfAddressPath)) {
            Mail::raw('Texto do e-mail de teste', function ($message) use ($proofOfAddressPath, $recipientEmail) {
                $message->to($recipientEmail, 'Marcos Flor')
                    ->subject('Bem-vindo ao Nosso Sistema')
                    ->attach($proofOfAddressPath, [
                        'as' => 'example.jpg', // Ajuste o nome do arquivo conforme necessário
                        'mime' => mime_content_type($proofOfAddressPath),
                    ]);
            });

            return "E-mail de teste enviado para $recipientEmail.";
        } else {
            return "Erro: Arquivo de comprovante de endereço não encontrado.";
        }
    } catch (\Exception $e) {
        return "Erro ao enviar e-mail de teste: " . $e->getMessage();
    }
}
   
    

}








