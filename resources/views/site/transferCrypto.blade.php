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
<link rel="stylesheet" type="text/css" href="/css/scroll.css">



<div class="container">

    <div class="row">

        <div class="col-md-6 mt-5 mb-5">
            <p class="display-5 fw-bold mt-5">Transferir <img src="/img/icon/arrow-swap-horizontal.svg"  width="80"></p>
            <h5>Envie suas criptos para outras carteiras através da área de transferência, selecionando a moeda e rede, informando valor e definindo endereço da carteira a receber.</h5>
        </div>
    
      
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="col-md-6 mt-5 mb-4">
            <div class="card cardTrade">
                <div class="card-title">
                    <h4>ENVIAR CRIPTO<h4>
                </div>
                <div class="card-body bodyCard">

                    <form method="post" action="">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Selecione uma moeda:</h6>
                                <select class="form-select" id="selectTransferCoin" aria-label="Default select example">
                                    <option value="" selected>Crypto</option>
                                    <option value="USDT">USDT</option>
                                    <option value="BTC">BTC</option>
                                    <option value="ETH">ETH</option>
                                    <option value="SOL">SOL</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <h6>Selecione a rede:</h6>
                                <select class="form-select"id="selectTransferNetwork" aria-label="Default select example">
                                    <option value="" selected>Rede</option>
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
                            class="btn btnColor mt-2 mb-2" 
                            onclick="openModalTransfer()"
                            data-bs-toggle="modal" >
                            Transferir
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


<script>

var selectTransferCoin = document.getElementById('selectTransferCoin');
var selectTransferNetwork = document.getElementById('selectTransferNetwork');

selectTransferNetwork.disabled = true;

var optionsMap = {
    'USDT': ['Ethereum [ERC-20]'],
    'BTC': ['Bitcoin'],
    'ETH': ['Ethereum [ERC-20]'],
    'SOL': ['Solana'],
};

selectTransferCoin.addEventListener('change', function() {
    selectTransferNetwork.disabled = false;

    var options = optionsMap[selectTransferCoin.value];
    
    while (selectTransferNetwork.firstChild) {
        selectTransferNetwork.removeChild(selectTransferNetwork.firstChild);
    }

    for (var i = 0; i < options.length; i++) {
        var option = document.createElement('option');
        option.value = options[i];
        option.text = options[i];
        selectTransferNetwork.appendChild(option);
    }
});

</script>


@endsection