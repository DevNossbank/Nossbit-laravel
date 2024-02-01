@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">


<div class="container">
    <div class="row">
        <h4 class="text-center mt-4">Minha carteira</h4>
        <div class="col-md-12 mt-3 mb-5">
            <div class="card cardTrade">
                <div class="card-title">
                    <h5>Moedas</h5>
                    <p>Sua lista de moedas para efetuar trocas e realizar saques</p>
                </div>
                <div class="card-body bodyCard">
                    <!-- Exibição do Saldo --> 
                  

                    @isset($saldo['USDT'])
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">MOEDA</th>
                                <th scope="col">DISPONÍVEL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>USDT</td>
                                <td>{{ $saldo['USDT']['available'] }}</td>
                            </tr>
                            <tr>
                                <td>BRL</td>
                                <td>{{ $saldo['BRL']['available'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endisset    
                </div>
            </div>
        </div>



            <div class="col-md-6 mt-4 mb-4">
                <div class="card cardTrade">
                    <div class="card-title">
                        <h5>NOVO DEPOSITO<h5>

                    </div>
                    <div class="card-body bodyCard">
                        <form method="post" action="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control" name="BRLdeposit" placeholder="0,00"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <center>
                            <button type="submit" class="btn btnColor" name="depositarBRL" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Depositar</button>
                            </center>
                        </form>
                    
                    </div>
                </div>
            </div>



            <div class="col-md-6 mt-4 mb-5">
                <div class="card cardTrade">
                    <div class="card-title">
                        <h5>SAQUE<h5>

                    </div>
                    <div class="card-body bodyCard">

                        <form method="post" action="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control" name="BRLwithdraw" placeholder="0,00"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Chave PIX</span>
                                <input type="text" class="form-control" name="chavePIX" placeholder="0,00"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <center>
                            <button type="submit" class="btn btnColor" name="sacarBRL" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Sacar</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>

            
    </div>
</div>

@endsection
