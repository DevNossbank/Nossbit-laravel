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
<link rel="stylesheet" type="text/css" href="/css/withdraw.css">

<div class="container withdraw">
    <div class="row">

        <div class="col-md-6 mt-5 mb-5 container-txts">
            <p class="display-5 fw-bold mt-5">Sacar <img src="/img/icon/money-send.svg"  width="50"></p>
            <p>Aqui você pode retirar seu saldo em reais para sua conta de origem, informando quantidade e chave PIX.</p>
        </div>


        <div class="col-md-6 mt-5 mb-4">
                <div class="card cardTrade">
                    <div class="card-title">
                        <h4>NOVO SAQUE</h4>
                    </div>
                    <div class="card-body bodyCard">

                        <P>Valor de saque disponível:</P>
                        <img src="/img/icon/brl-icon.png"  width="35"> BRL

                        :

                        R$ {{ $saldo['BRL']['available'] }}

                        <form method="post" action="">
                            @csrf
                            <div class="input-group mb-3 mt-4">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control" id="BRLwithdraw" placeholder="0,00"
                                    aria-label="Username" aria-describedby="basic-addon1"
                                    data-mask='#,##0.00'>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Chave PIX</span>
                                <input type="text" class="form-control" id="PIX" placeholder=""
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <center>
                                <button 
                                type="button" 
                                class="btn btnColor" 
                                onclick="openModalWithdraw()"
                                data-bs-toggle="modal" >
                                Sacar
                            </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="col-md-12 mt-3 mb-5">
            <div class="card cardTrade">

                <div class="card-title">
                    <h5>HISTÓRICO DE SAQUE<h5>

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
                                <th scope="col">PIX</th>
                                <th scope="col">TAXA</th>
                                <th scope="col">STATUS</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdraws as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($item['timestamp'])->toDateTimeString() }}</td>
                                        <td>{{ $item['coin'] }}</td>
                                        <td>{{ $item['value'] }}</td>
                                        <td>{{ $item['bank'] }}</td>
                                        <td>{{ $item['pixKey'] }}</td>
                                        <td>{{ $item['withdrawFee'] }}</td>
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


@include('site.modals.confirmWithdraw')

<script src="https://jsuites.net/v4/jsuites.js"></script>


@endsection