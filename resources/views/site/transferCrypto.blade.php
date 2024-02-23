@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/statusColor.css">
<link rel="stylesheet" type="text/css" href="/css/accordion.css">


<div class="container">
    <h4 class="text-center mt-4">Transferência entre carteiras de crypto</h4>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card cardTrade mt-5">
                <div class="card-title">
                    <h4>CARTEIRAS<h4>
                </div>
                <div class="card-body bodyCard">
                    <h5 class="mt-3">Endereços de depósito:</h5>

                    <div class="accordion" id="accordionExample">
                        @foreach ($wallets as $coin => $wallet)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $coin }}" aria-expanded="true" aria-controls="collapse{{ $coin }}">
                                        {{ $coin }} <img src="/img/icon/{{ $coin }}-icon.png"  width="35"> 
                                    </button>
                                </h2>
                                <div id="collapse{{ $coin }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h5>Rede: {{ $wallet['networkName'] }}</h5>
                                        <p>Endereço: {{ $wallet['address'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
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
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Selecione uma moeda:</h6>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Crypto</option>
                                    <option value="USDT">USDT</option>
                                    <option value="BTC">BTC</option>
                                    <option value="ETH">ETH</option>
                                    <option value="SOL">SOL</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <h6>Selecione a rede:</h6>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Rede</option>
                                    <option value="eth20">Ethereum [ERC-20]</option>
                                    <option value="bitcoin">Bitcoin</option>
                                    <option value="solana">Solana</option>


                                </select>
                            </div>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label mt-4">Valor da Transferência:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="moedaCrypto" id="valueSendCrypto"
                                placeholder="0,00" aria-label="Username" aria-describedby="basic-addon1"
                                data-mask='#,##0.00'>
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

<script src="https://jsuites.net/v4/jsuites.js"></script>


@endsection