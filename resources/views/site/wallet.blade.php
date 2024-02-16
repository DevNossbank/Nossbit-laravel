@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/statusColor.css">



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



            <div class="col-md-6 mt-4 mb-5">
                <div class="card cardTrade">
                    <div class="card-title">
                        <h5>SAQUE 
                            <img src="/img/icon/brl-icon.png"  width="35"><h5>

                    </div>
                    <div class="card-body bodyCard">

                        <form method="post" action="">
                            <div class="input-group mb-3">
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

            <hr>

        <h4 class="text-center mt-3">Histórico</h4>

            <div class="col-md-12 mt-3 mb-5">
                <div class="card cardTrade">
    
                    <div class="card-title">
                        <h5>DEPÓSITO E SAQUE EM REAIS<h5>
    
                    </div>

                    <div class="card-body bodyCard">  
                        <h5>Depósitos em reais:</h5>
    
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

                        
                        

                        <hr>
    

                        <H5>Saques em reais:</H5>
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

@include('site.modals.confirmDeposit')

@include('site.modals.confirmWithdraw')

<script src="https://jsuites.net/v4/jsuites.js"></script>

@endsection
