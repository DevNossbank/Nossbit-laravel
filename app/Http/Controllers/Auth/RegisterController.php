<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\EmailController;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest');
        
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'string','cpf', 'unique:users'],
        ]);

        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);

        /*
 // Redirecionar para a rota de envio de e-mail com os dados necessários
 return redirect()->route('enviar-email', [
    'name' => $data['name'],
    'email' => $data['email'],
    'cpf' => $data['cpf'],
    'proof_of_address' => $data['proof_of_address'],
    'photo_proof' => $data['photo_proof'],
]);

*/
//dd($request->all());
if (request()->hasFile('proof_of_address')) {
    // Obtenha o arquivo do request
    $proofOfAddress = request()->file('proof_of_address');
    

    //dd("Passou papai");

}
    //$proofOfAddress = $data['proof_of_address'];

    

    // Enviar e-mail de teste
  //  $proofOfAddress = $data['proof_of_address'];
    $emailController = new EmailController();
    /*
    $emailController->enviarEmailTeste($data, $proofOfAddress);
    */
    $emailController->enviarEmailTeste($data, $proofOfAddress);

    $user= User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'cpf' => $data['cpf'],
        'password' => Hash::make($data['password']),
    ]);

    //dd($request->all());
    //dd("Caralho2");
    

    return $user;
       
        
        /*Abaixo é o novo*/ 
    // Criar usuário no banco de dados sem os arquivos

 // Enviar e-mail com informações e arquivos
/*

 $proofOfAddress = $data['proof_of_address'];
 $photoProof = $data['photo_proof'];

 $emailController = new EmailController();
 $emailController->enviarEmailTeste($data, $proofOfAddress, $photoProof);
 dd($emailController);

 */
 // Redirecionar para a página inicial ou qualquer página desejada


 //return redirect()->route('home');

 
/*


    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'cpf' => $data['cpf'],
        'password' => Hash::make($data['password']),
    ]);

    // Armazenar informações do usuário (detalhes adicionais)
    $userDetails = UserDetails::create([
        'user_id' => $user->id,
        // Adicione outros campos de detalhes do usuário conforme necessário
    ]);

   
*/
       
    }
}
