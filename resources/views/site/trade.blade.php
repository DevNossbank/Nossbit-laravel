@extends('layouts.app')
@section('title', 'Index')
@section('content') 

<link rel="stylesheet" type="text/css" href="/css/index.css">
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/select.css">

    <div class="container">
       <div class="row mt-5 mb-5">
        <h1 class="display-5">Efetue negociações com o Nossbit!</h1>
                <h5 class="amarelo mb-5">Compre e venda de forma simplificada</h5>

                <div class="col-md-5 mt-2">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                                    {
                                    "symbols": [
                                    [
                                        "BINANCE:USDTBRL|60M"
                                    ],
                                    [
                                        "BINANCE:ETHBRL|60M"
                                    ],
                                    [
                                        "BINANCE:BTCBRL|60M"
                                    ],
                                    [
                                        "BINANCE:SOLBRL|60M"
                                    ]
                                    ],
                                    "chartOnly": true,
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "br",
                                    "colorTheme": "dark",
                                    "autosize": true,
                                    "showVolume": false,
                                    "showMA": false,
                                    "hideDateRanges": false,
                                    "hideMarketStatus": false,
                                    "hideSymbolLogo": false,
                                    "scalePosition": "right",
                                    "scaleMode": "Normal",
                                    "fontFamily": "Trebuchet MS, sans-serif",
                                    "fontSize": "10",
                                    "noTimeScale": false,
                                    "valuesTracking": "1",
                                    "changeMode": "price-and-percent",
                                    "chartType": "area",
                                    "maLineColor": "#2962FF",
                                    "maLineWidth": 1,
                                    "maLength": 9,
                                    "backgroundColor": "rgba(0, 0, 0, 0.296)",
                                    "lineWidth": 2,
                                    "lineType": 0,
                                    "dateRanges": [
                                    "1d|1",
                                    "1m|30",
                                    "3m|60",
                                    "12m|1D",
                                    "60m|1W"
                                    ],
                                    "dateFormat": "MMM dd, yyyy"
                                }
                        </script>
                    </div>
                <!-- TradingView Widget END -->
                </div>
            <!------------------------------------------------------------------>

            <div class="col-md-7 mt-2">
                <div class="exchange-quadro">
                    <div class="input-group mb-3">
                        <div class="saldo">
                            <h4 class="text-center">Saldo</h4>
                        </div>
                        <div class="marca">
                            <h4 class="text-center">NOSSBIT</h4>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login') }} " class="formPart">
                        @csrf

                        <label for="exampleFormControlInput1" class="form-label">Trocar:</label>

                            <div class="row">
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="text" id="ExchangeValue" class="form-control" name="ExchangeValue"
                                            placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1"
                                            data-mask='#,##0.00'>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="select">
                                        <select class="selectTrocar" id="selectExchangeCoin">
                                            <option selected>Select</option>

                                            <option value="BRL">BRL</option>
                                            <option value="USDT">USDT</option>
                                            <option value="BTC">BTC</option>
                                            <option value="ETH">ETH</option>
                                            <option value="SOL">SOL</option>

                                        </select>
                                        <div class="select_arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul>
                                <li>Taxa: </li>
                                <li id="priceValue" data-value="abc">Cotação:</li>
                            </ul>


                            <label for="exampleFormControlInput1" class="form-label">Receber:</label>
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="text" id="ReceiptValue" class="form-control" name="ReceiptValue"
                                            placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1"
                                            readonly>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="select">
                                        <select id="selectReceipt">
                                            <option selected>Select</option>
                                            <option value="BRL">BRL</option>
                                            <option value="USDT">USDT</option>
                                            <option value="BTC">BTC</option>
                                            <option value="ETH">ETH</option>
                                            <option value="SOL">SOL</option>
                                        </select>
                                        <div class="select_arrow">
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button 
                                    type="button" 
                                    class="btn btnColor btn-lg" 
                                    id="exchange" 
                                    name="depositarBRL"
                                    onclick="openModal()"
                                    data-bs-toggle="modal" >
                                    <b>Efetuar Troca</b>
                                </button>
                            </div>

                    </form>



                </div>
            </div>  
            
            @if (Route::has('trades'))
            <h5><u><a class="nav-link text-end mt-4" href="{{ route('trades') }}">{{ __('Ver todas as minhas negociações') }}</a></u></h5>
        @endif 
       </div>
    </div>

    <script src="https://jsuites.net/v4/jsuites.js"></script>


    <!--Tirar daqui depois-->
    <script>
        // Seleciona os elementos
        var selectExchangeCoin = document.getElementById('selectExchangeCoin');
        var selectReceipt = document.getElementById('selectReceipt');

        // Função para ajustar as opções
        function adjustOptions(selectedValue, selectElement) {
            var options = selectElement.options;
            for (var i = 0; i < options.length; i++) {
                if (selectedValue === 'BRL' && options[i].value !== 'BRL') {
                    options[i].disabled = false;
                } else if (selectedValue !== 'BRL' && options[i].value === 'BRL') {
                    options[i].disabled = false;
                } else {
                    options[i].disabled = true;
                }
            }
        }

        selectExchangeCoin.addEventListener('change', function() {
            adjustOptions(this.value, selectReceipt);
        });

        selectReceipt.addEventListener('change', function() {
            adjustOptions(this.value, selectExchangeCoin);
        });

   </script>
    <script type="module" src=" {{ asset('js/trade.js') }}"></script>
    @include('site.modals.confirmTrade')
@endsection