@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">

<div class="container">
    <h4 class="text-center mt-4">Transferência</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card cardTrade mt-5">
                <div class="card-title">
                    <h4>CARTEIRAS<h4>
                </div>
                <div class="card-body bodyCard">

                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="col-md-6 mt-5 mb-4">
            <div class="card cardTrade">
                <div class="card-title">
                    <h4>ENDEREÇO<h4>
                </div>
                <div class="card-body bodyCard">

                    <form method="post" action="">
                        <label for="exampleFormControlInput1" class="form-label">Valor da Transferência -
                            USDT:</label>
                        <div class="input-group mb-3">

                            <span class="input-group-text" id="basic-addon1">USDT</span>
                            <input type="text" class="form-control" name="moedaCrypto" id="valorTrans"
                                placeholder="0,00" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label mt-2">Endereço carteira:</label>
                        <div class="input-group mb-3">

                            <input id="endTrans" type="text" class="form-control" name="walletAddress"
                                placeholder="Insira o endereço da carteira" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <center>
                            <button id="transfer" type="button" class="btn btnColor" name="transferCrypto"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Transferir</button>
                        </center>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection