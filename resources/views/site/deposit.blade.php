@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/statusColor.css">
<link rel="stylesheet" type="text/css" href="/css/scroll.css">
<link rel="stylesheet" type="text/css" href="/css/deposit.css">

<div class="container deposit ">
    <div class="row">

        <div class="col-md-6 mt-5 pr-4 mb-5 container-txts">
            <p class="display-5 fw-bold mt-5">Depositar <img src="/img/icon/money-recive.svg"  width="50"></p>
            <p class="baixo-titulo">Aqui você informa o quanto quer depositar em sua conta para efetuar a compra de criptos na plataforma.</p>
        </div>


        <div class="col-md-6 mt-5 mb-4">
            <div class="card cardTrade">
                <div class="card-title">
                    <h5>NOVO DEPOSITO<h5>
                </div>
                <div class="card-body bodyCard">
                    <form method="post" action="">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">BRL</span>
                            <input type="text" class="form-control" id="BRLdeposit" name="BRLdeposit" placeholder="0.00"
                                aria-label="Username" aria-describedby="basic-addon1"
                                data-mask='#,##0.00'>
                        </div>
                        <br><br>
                        <center>
                            <button 
                            type="button" 
                            class="btn btnColor" 
                            onclick="openModalDeposit()"
                            data-bs-toggle="modal" >
                            Depositar
                        </button>
                        </center>
                    </form>
                
                </div>
            </div>
        </div>

        <hr>

        <div class="col-md-12 mt-3 mb-5">
            <div class="card cardTrade">

                <div class="card-title">
                    <h5>HISTÓRICO DE DEPÓSITO<h5>

                </div>

                <div class="card-body bodyCard">  

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">HORA (ano-mês-dia)</th>
                                <th scope="col">MOEDA</th>
                                <th scope="col">VALOR</th>
                                <th scope="col">BANCO</th>
                                <th scope="col">STATUS</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($deposits as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($item['timestamp'])->toDateTimeString() }}</td>
                                        <td>{{ $item['coin'] }}</td>
                                        <td>{{ $item['value'] }}</td>
                                        <td>{{ $item['bank'] }}</td>
                                        <td class="status {{ strtolower($item['status']) }}">{{ $item['status'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Nenhum dado disponível</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('site.modals.confirmDeposit')

@include('site.modals.confirmWithdraw')

<script src="https://jsuites.net/v4/jsuites.js"></script>


@endsection