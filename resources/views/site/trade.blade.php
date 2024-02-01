@extends('layouts.app')
@section('title', 'Index')
@section('content') 

<link rel="stylesheet" type="text/css" href="/css/index.css">
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/select.css">

    <div class="container">
       <div class="row">
            <div class="col-md-5">
                <h1 class="display-5">Efetue negociações com o Nossbit!</h1>
                <h5 class="amarelo">Compre e venda de forma simplificada</h5>
            </div>
            <!------------------------------------------------------------------>

            <div class="col-md-7">
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
                                            placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="select">
                                        <select class="selectTrocar" id="selectExchangeCoin">
                                            <option value="">Crypto</option>
                                            <option value="USDT" data-image="img/icon/USDT-icon.png">USDT</option>
                                            <option value="BRL">BRL</option>
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
                                            placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="select">
                                        <select id="selectReceipt">
                                            <option value="">Crypto</option>
                                            <option value="BRL">BRL</option>
                                            <option value="USDT">USDT</option>
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
       </div>
    </div>

    <!--Tirar daqui depois-->
    <script>
        document.getElementById('selectExchangeCoin').addEventListener('change', function () {
            var selectedValue = this.value;

            var selectReceber = document.getElementById('selectReceipt');
            for (var i = 0; i < selectReceber.options.length; i++) {
                if (selectReceber.options[i].value === selectedValue) {
                    selectReceber.options[i].disabled = true;
                } else {
                    selectReceber.options[i].disabled = false;
                }
            }
        });

        document.getElementById('selectReceipt').addEventListener('change', function () {
            var selectedValue = this.value;
            var selectTrocar = document.getElementById('selectExchangeCoin');
            for (var i = 0; i < selectTrocar.options.length; i++) {
                if (selectTrocar.options[i].value === selectedValue) {
                    selectTrocar.options[i].disabled = true;
                } else {
                    selectTrocar.options[i].disabled = false;
                }
            }
        });
    </script>
    <script type="module" src=" {{ asset('js/trade.js') }}"></script>
    @include('site.modals.confirmTrade')
@endsection