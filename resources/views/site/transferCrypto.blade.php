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
    <h4 class="text-center mt-4">Transferência entre carteiras de crypto</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card cardTrade mt-5">
                <div class="card-title">
                    <h4>CARTEIRAS<h4>
                </div>
                <div class="card-body bodyCard">
                   
                    @isset($userWallet)

                        <h5 class="mt-3">Endereço de depósito:</h5>

                        <hr>
                        <p class="mt-3"><img src="/img/icon/USDT-icon.png"  width="35"> USDT:</p>
                         <p>{{ $userWallet }}</p>

                         <hr>
                    @endisset   
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
                            <input type="text" class="form-control" name="moedaCrypto" id="valueSendCrypto"
                                placeholder="0,00" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label mt-2">Endereço carteira:</label>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" name="walletAddress" id="walletID"
                                placeholder="Insira o endereço da carteira" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <center>
                            <button 
                            type="button" 
                            class="btn btnColor" 
                            onclick="openModalTransfer()"
                            data-bs-toggle="modal" >
                            Enviar
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
                    <h5>TRANSFÊRENCIA ENTRE CARTEIRAS<h5>

                </div>
                <div class="card-body bodyCard">

                    <h5>Recebimentos de Cryptomoedas:</h5>

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">HORA (ano-mês-dia)</th>
                                <th scope="col">MOEDA</th>
                                <th scope="col">QUANTIDADE</th>
                                <th scope="col">TAXA</th>
                                <th scope="col">HASH</th>
                                <th scope="col">STATUS</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($depositsCrypto as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($item['timestamp'])->toDateTimeString() }}</td>
                                        <td>{{ $item['coin'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['fee'] }}</td>
                                        <td>{{ $item['hash'] }}</td>
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

                    <H5>Envios de Cryptomoedas:</H5>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">HORA (ano-mês-dia)</th>
                                <th scope="col">MOEDA</th>
                                <th scope="col">QUANTIDADE</th>
                                <th scope="col">TAXA</th>
                                <th scope="col">HASH</th>
                                <th scope="col">STATUS</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawsCrypto as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($item['timestamp'])->toDateTimeString() }}</td>
                                        <td>{{ $item['coin'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['fee'] }}</td>
                                        <td>{{ $item['hash'] }}</td>
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

@include('site.modals.confirmCryptoTransfer')

@endsection