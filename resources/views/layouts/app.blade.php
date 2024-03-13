<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nossbit') }}</title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/navteste.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container-fluid">
               
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                    <img src='/img/icon/WhiteIcon.png' />
                </a>
                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Route::has('trade'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('trade') }}">{{ __('Negociar') }}</a>
                            </li>
                        @endif

                        @if (Route::has('wallet'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wallet') }}">{{ __('Meu Saldo') }}</a>
                        </li>
                         @endif

                         @if (Route::has('deposit'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('deposit') }}">{{ __('Depositar') }}</a>
                        </li>
                         @endif

                         @if (Route::has('withdraw'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('withdraw') }}">{{ __('Sacar') }}</a>
                         </li>
                          @endif

                         @if (Route::has('transferCrypto'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('transferCrypto') }}">{{ __('Enviar Criptomoedas') }}</a>
                         </li>
                          @endif

                          @if (Route::has('transferCrypto'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('transferCrypto') }}">{{ __('Receber Criptomoedas') }}</a>
                          </li>
                           @endif
                    </ul>
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                           
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    <!-------------------FOOTER-------------------------------------------->
    <div class="row footer">
        <div class="col-md-3 text-start">
            <p class="nossbitTitle">nossbit</p>
            <p><h5 class="fw-bold">Location:</h5>Alameda Santos 700 - cj.132</p>
            <p>Cerqueira César - São Paulo - Brazil</p>
            <p>CEP: 01418-100</p>
        </div>  
        <div class="col-md-5">
        </div> 
        <div class="col-md-3 text-start mt-3">
            <h5 class="fw-bold">Social Media</h5>
            <p>Instagram</p>
            <p>LinkedIn</p>
            <p>Facebook</p>
            <p>Twitter</p>
        </div>  
        <div class="col-md-12 text-center mt-5">
            <h6>Nosscompany Serviços Digitais Ltda - CNPJ 44.868.835/0001-33</h6>
        </div>
    </div>
    
    <!--------------------------------------------------------------------------------------------------------------------->

</body>
</html>
