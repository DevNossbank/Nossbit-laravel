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

        <div class="col-12 row mt-1 d-flex flex-wrap gap-3" style="padding-bottom:50px;padding-top:50px;">

            <div class="col brlsaldo borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="token">BRL </h4>
                        <br>
                        <br>
                        <br>
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


            </div>

            <div class="col usdtsaldo saldoEmMoedas borderSaldo" id="saldoEmMoedas">

                <div class="row padding pt-4">
                    <div class="col-md-8">
                        <h4 class="fw-bold" id="token">USDT </h4>
                        <h5 id="network">USDT</h5>
                        <p>Rede: Ethereum [ERC-20]</p>

                    </div>
                    <div class="col-md-4">
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

            

            <div class="col btcsaldo saldoEmMoedas borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-8">
                        <h4 class="fw-bold" id="token">Bitcoin </h4>
                        <h5 id="network">BTC</h5>
                        <p>Rede: Bitcoin</p>
                    </div>
                    <div class="col-md-4">
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

        </div>

        <div class="col-12 row mt-1 mb-5 d-flex flex-wrap gap-2" style="padding-bottom:100px;">

           

            <div class="col ethsaldo saldoEmMoedas borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="token">Ethereum </h4>
                        <h5 id="network">ETH</h5>
                        <p>Rede: Ethereum [ERC-20]</p>
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

            <div class="col usdcsaldo saldoEmMoedas borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="token">USDC </h4>
                        <h5 id="network">USDC</h5>
                        <p>Rede: Ethereum [ERC-20]</p>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/usdcW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['USDC']['available'] }}</h3>
                 

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>

            <div class="col solsaldo saldoEmMoedas borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="token">Solana </h4>
                        <h5 id="network">SOL</h5>
                        <p>Rede: SOL</p>
                        <br>

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

            <div class="col trxsaldo saldoEmMoedas borderSaldo">

                <div class="row padding pt-4">
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="token">TRON </h4>
                        <h5 id="network">TRX</h5>
                        <p>Rede: TRON</p>
                        <br>
                    </div>
                    <div class="col-md-5">
                        <img src="/img/wallet/trxW.svg"  width="73">
                    </div>
                </div>

                <hr class="">

                <div class="padding pb-4">

                    <p>Saldo:</p>
                    <h3>{{ $saldo['TRX']['available'] }}</h3>
                 

                </div>

                <div class="darkEnd">
                    <p class="text-center pt-3"><img src="/img/wallet/wallet.svg"  width="20"> Ver endereço</p>
                </div>

            </div>

           
        </div>

    </div>
</div>
          



<script src="https://jsuites.net/v4/jsuites.js"></script>


@include('site.modals.viewCryptoAddress')
@endsection
