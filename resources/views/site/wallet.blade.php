@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/scroll.css">
<link rel="stylesheet" type="text/css" href="/css/wallet.css">




<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h4 class="mt-5 display-5 fw-bold">Minha carteira <img src="/img/icon/wallet.svg"  width="50"></h4>
            <p>Acompanhe o saldo completo de sua carteira por aqui!
                Sempre atualizado de acordo com sua movimentação.</p>
        </div>

        <div class="col-12 row mt-4 mb-5 d-flex flex-wrap gap-2" style="padding-bottom:100px;padding-top:50px;">

            <div class="col brlsaldo saldoEmMoedas">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold">BRL </h3>
                        <h5>BRL</h5>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/brlW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['BRL']['available'] }}</h3>

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>


            </div>

            <div class="col usdtsaldo saldoEmMoedas  ">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold">USDT </h3>
                        <h5>USDT</h5>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/usdtW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['USDT']['available'] }}</h3>

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>

            <div class="col solsaldo saldoEmMoedas">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold">SOL </h3>
                        <h5>SOL</h5>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/solW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['SOL']['available'] }}</h3>

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>

            <div class="col btcsaldo saldoEmMoedas">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold">BTC </h3>
                        <h5>BTC</h5>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/btcW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['BTC']['available'] }}</h3>

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>

            <div class="col ethsaldo saldoEmMoedas ">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold">ETH </h3>
                        <h5>ETH</h5>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/ethW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['ETH']['available'] }}</h3>

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>
           
        </div>

    </div>
</div>
          



<script src="https://jsuites.net/v4/jsuites.js"></script>

@endsection
