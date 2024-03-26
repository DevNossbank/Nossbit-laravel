@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/form.css">
<link rel="stylesheet" type="text/css" href="/css/scroll.css">

<style>
    /*
input#doc_id {
    background-image: url(/img/register/botao_anexar_documento.png);
}
*/

#doc_id {
    display: none;
}
#proof_of_address{
    display: none;
}
#photo_proof{
    display: none;
}
.anexar-documento{
    /*
    background-image: url(/img/register/botao_anexar_documento.png);
    background-repeat: no-repeat;
    background-size: contain;
    */
    background: linear-gradient(90deg, rgb(236.94, 177.62, 25.08) 0%, rgb(245.44, 203.91, 56.66) 46.15%, rgb(235.88, 202.14, 115.38) 100%);
    
    display: flex;
    align-items: center;
    border-radius: 10px;
    align-items: center;
    justify-content: center;
    width: 48%;
    color:black;
    font-weight:600;
    font-size:16px;
    height:55px;

}
.anexar-documento:hover {
    cursor: pointer;
}
.icone-anexo {
    width: 25px;
    margin-right: 5px;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtém uma referência ao elemento que você deseja monitorar para cliques
    const anexarDocumento = document.querySelector('.anexar-documento.rg');

    // Adiciona um ouvinte de eventos para o evento de clique ao elemento
    anexarDocumento.addEventListener('click', function() {
        // Obtém uma referência ao campo de arquivo
        const docId = document.getElementById('doc_id');
        // Simula um clique no campo de arquivo
        docId.click();
    });

    /// identificação 


        // Obtém uma referência ao elemento que você deseja monitorar para cliques
        const anexarDocumentoResidencia = document.querySelector('.anexar-documento.residencia');

        // Adiciona um ouvinte de eventos para o evento de clique ao elemento
        anexarDocumentoResidencia.addEventListener('click', function() {
        // Obtém uma referência ao campo de arquivo
        const docId = document.getElementById('proof_of_address');
        // Simula um clique no campo de arquivo
        docId.click();
    });

    /// foto com documento de identificação


        // Obtém uma referência ao elemento que você deseja monitorar para cliques
        const anexarDocumentoIdentificacao = document.querySelector('.anexar-documento.ft-identidade');

        // Adiciona um ouvinte de eventos para o evento de clique ao elemento
        anexarDocumentoIdentificacao.addEventListener('click', function() {
        // Obtém uma referência ao campo de arquivo
        const docId = document.getElementById('photo_proof');
        // Simula um clique no campo de arquivo
        docId.click();
    });
});
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center fw-bold">Faça seu Cadastro</h3>
                    <p class="text-center">E desbrave o mundo crypto.</p>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder='{{ __("Digite seu nome") }}' type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        


                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf " placeholder='{{ __("Digite seu CPF") }}' type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder='{{ __("Digite seu email") }}' type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                            </div>

                            <div class="col-md-6">
                                <button type="button" class="btn buttonDark" id="sendVerificationCode">Enviar Código de Verificação</button>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="verification_code" class="col-md-4 col-form-label text-md-end">Código de Verificação</label>

                            <div class="col-md-6">
                                <input id="verification_code" placeholder='{{ __("Digite o código de verificação") }}'  type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required>
                                @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder='{{ __("Digite sua senha") }}' type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder='{{ __("Digite novamente sua senha") }}' type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="row mb-3 mt-5">
                            <label for="doc_id" class="col-md-4 col-form-label text-md-end">{{ __('Documento de identificação') }}</label>
                            <div class="col-md-6 anexar-documento rg" id="anexarDocumento">
                            <img class="img-fluid icone-anexo" src="/img/register/icone-anexar-doc.png" />
                            <div>Anexar Documento</div>
                                <input id="doc_id" enctype="multipart/form-data" type="file" class="" name="doc_id" accept="image/*" required>
                            </div>
                        </div>


                        <div class="row mb-3 mt-4">
                            <label for="proof_of_address" class="col-md-4 col-form-label text-md-end">{{ __('Comprovante de residência') }}</label>
                            <div class="col-md-6 anexar-documento residencia" id="anexar-comprovante-residencia">
                            <img class="img-fluid icone-anexo" src="/img/register/icone-anexar-doc.png" />
                            <div>Anexar Documento</div>
                                <input id="proof_of_address" enctype="multipart/form-data" type="file" class="form-control" name="proof_of_address" accept="image/*" required>
                                
                            </div>
                            <p class="text-center mt-1"><font color="#B9B9B9">(Até 90 dias após vencimento)</font></p>
                        </div>

                        <div class="row mb-3 mt-3">
                            <label for="photo_proof" class="col-md-4 col-form-label text-md-end">{{ __('Foto com Documento de Identificação') }}</label>
                            <div class="col-md-6 anexar-documento ft-identidade" >
                            <img class="img-fluid icone-anexo" src="/img/register/icone-anexar-doc.png" />
                            <div>Anexar Documento</div>
                                <input id="photo_proof" enctype="multipart/form-data" type="file" class="form-control" name="photo_proof" accept="image/*" required>
                                
                            </div>
                            <p class="text-center mt-1"><font color="#B9B9B9">(Segurar documento ao lado do rosto)</font></p>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btnColor p-2">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('sendVerificationCode').addEventListener('click', function() {
        var email = document.getElementById('email').value;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if(email!=""){
            fetch('/send-verification-code', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': token,

                },
                body: JSON.stringify({ email: email }),
            })
            .then(function(response) {
                console.log(response)
                if (response.ok) {
                    alert('Código de verificação enviado para o seu e-mail.');
                } else {
                    throw new Error('Ocoruureu um erro ao enviar o código de verificação.');
                    console.log(response)
                }
            })
            .catch(function(error) {
                alert(error.message);
            });

        }else{
            alert('Insira um endereço de email');
        }

        
    });
</script>
@endsection
