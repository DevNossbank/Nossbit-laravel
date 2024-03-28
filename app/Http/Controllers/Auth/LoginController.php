<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersLogLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // Adicione esta linha

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Armazenar o CPF na sessão após o login bem-sucedido.
        session(['cpf' => $user->cpf]);
    

        UsersLogLogin::logLogin($user->id, $request->ip());

        // Verifica se o status KYC do usuário não está aprovado
        if ($user->status_kyc !== 'LIBERADO') {
            // Faz logout do usuário
            Auth::logout();

            // Redireciona de volta para a página de login com uma mensagem de erro
            return redirect()->route('login')->withErrors(['status_kyc' => 'Seu status KYC ainda não foi aprovado.']);
        }
        return redirect()->intended($this->redirectTo);
    }
}







