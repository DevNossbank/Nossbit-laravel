@extends('layouts.app')
@section('title', 'Index')
@section('content') 

<link rel="stylesheet" type="text/css" href="/css/index.css">
<link rel="stylesheet" type="text/css" href="/css/accordion.css">
<link rel="stylesheet" type="text/css" href="/css/scroll.css">



<div>
    <div class="container indexContainer">
        <video autoplay loop muted plays-inline class="background-clip">
            <source src="/img/Video.mp4" type="video/mp4">
        </video>

        <div class="content">
            <div class="row">
                <div class="col-md-5 my-auto">

                    <h1 class="mt-10 display-5 fw-bold">Compra e venda diversos ativos com segurança.</h1>
                    <p class="txt-baixo-titulo">Bitcoin, Ethereum, USDT e entre os mais diversos e populares criptoativos do mercado.</p>
                    <br>
                    <a class="btn-negociar" href="{{ route('trade') }}">Negociar</a>

                </div>
                <div class="col-md-7">
                    <img class="img-fluid mockup-celular" src="/img/index/celular.png" />
                    
                </div>
            </div>
            
        </div> 
    </div>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
        {
        "symbols": [
        {
            "description": "",
            "proName": "BINANCE:USDTBRL"
        },
        {
            "description": "",
            "proName": "BINANCE:BTCBRL"
        },
        {
            "description": "",
            "proName": "BINANCE:SOLBRL"
        },
        {
            "description": "",
            "proName": "BINANCE:ETHBRL"
        }
        ],
        "isTransparent": false,
        "showSymbolLogo": true,
        "colorTheme": "dark",
        "locale": "br"
    }
        </script>
    </div>
    <!-- TradingView Widget END -->

    
    <div class="containerLoseTime">
        <div class="container text-center mt-3 mb-3">
            <div class="row align-items-center">
                <div class="col-md-5 text-start mt-5 mb-1 p-4">
                    <h1 class="fw-bold display-5">Não perca tempo e venha para a NOSSBIT</h1>
                    <p class="txt-baixo-titulo">Junte-se à revolução financeira com a Nossbit! Cadastre-se agora e tenha acesso a uma plataforma de crypto exchange segura e intuitiva. Explore um mundo de oportunidades no mercado de criptomoedas. Registre-se hoje e comece a investir no seu futuro!</p>
                </div>
                <div class="col-md-7 mt-5 mb-3 p-4">
                    <img class="imgLoseTime img-fluid " src="/img/index/relogio.png"  />
                </div>
            </div>
        </div>
    </div>
    <div class="containerPossibilites mt-5">
        <div class="text-center">
            <h2 class="mt-5 fw-bold display-6">Com a NOSSBIT você tem</h2>
            <h2 class="display-6 ">Infinitas Possibilidades</h2>
            <img class="imageInfoHome img-fluid" src="/img/index/formasMoedas.png" />           
        </div>
    </div>
    <div class="mt-5 mb-5 perguntas">
        <h2 class="mt-6 mb-5 display-6 text-center fw-bold">Perguntas Frequentes</h2>
        <div class="accordion mt-3" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 <b> Como comprar cripto?</b>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sodales tempus condimentum. Nam convallis lacinia egestas. Cras eu quam sagittis, pretium magna quis, eleifend ligula. Fusce sollicitudin commodo lobortis. Etiam at pulvinar augue. Cras molestie vehicula libero, quis tristique lectus. Phasellus at fringilla mi. Aenean porttitor mi vitae eros lobortis ullamcorper. Vivamus convallis erat ac malesuada ornare. Etiam vitae augue fringilla, vestibulum eros sed, euismod sem. Donec aliquam, nibh sed egestas tincidunt, tortor ex accumsan urna, eu gravida ligula arcu eget tortor. In hac habitasse platea dictumst. Sed velit turpis, condimentum vel diam vel, dapibus laoreet justo. Aenean tristique laoreet velit eu posuere. Vivamus augue ex, facilisis sed feugiat eget, hendrerit id eros. Morbi rutrum pellentesque lacus et euismod.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <b>Cripto ativos são confiáveis?</b>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <b> Como Transferir Criptos?</b>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="containerInfoHome mt-5">
        <div class="text-center">
            <div class="row">
                <div class="col-md-12 mb-5 mt-5 titulo-experiencia">
                    <h2><b>A experiência mais completa em criptoativos</b></h2>
                    <h6>com total segurança e fluidez para atender o mercado crypto com excelência!</h6>
                </div>
                <div class="col-md-3 mb-4 mt-3">
                    <img class="imageInfoHome" src="/img/index/infoHome1.png" />
                    <h5 class="mt-4 mb-2 fw-bold sub-titulo">Verificação de preço de criptoativos em tempo real</h5>
                    <p class="txt-experiencia">Consulte em tempo real os preços dos ciptoativos na tela de bloqueio sem executar aplicativo</p>
                </div>
                <div class="col-md-3  mb-4 mt-3">
                    <img class="imageInfoHome" src="/img/index/infoHome2.png"  />
                    <h5 class="mt-4 mb-2 fw-bold sub-titulo">Seguro e fácil de operar</h5>
                    <p class="txt-experiencia">Realize suas transações protegidas por tecnologia de ponta. Nossos parceiros são especalistas em segurança e líderes da indústria.</p>
                </div>
                <div class="col-md-3  mb-5 mt-3">
                    <img class="imageInfoHome" src="/img/index/infoHome3.png"  />
                    <h5 class="mt-4 mb-2 fw-bold sub-titulo">Tendências de criptoativos em tempo real</h5>
                    <p class="txt-experiencia">Com um servidor estável e uma equipe de desenvolvimento com foco na agilidade e nas negociações, investir em criptoativos ficou muito mais fácil.</p>
                </div>
                <div class="col-md-3 mb-5 mt-3">
                    <img class="imageInfoHome" src="/img/index/infoHome4.png"  />
                    <h5 class="mt-4 mb-2 fw-bold sub-titulo">Ativos virtuais cuidadosamente selecionados</h5>
                    <p class="txt-experiencia">Consulte em tempo real os preços dos ciptoativos na tela de bloqueio sem executar aplicativo</p>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection