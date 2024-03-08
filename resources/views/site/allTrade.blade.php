@extends('layouts.app')
@section('title', 'AllTrade')
@section('content') 

<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">
<link rel="stylesheet" type="text/css" href="/css/trade.css">
<link rel="stylesheet" type="text/css" href="/css/statusColor.css">
<link rel="stylesheet" type="text/css" href="/css/filter.css">
<link rel="stylesheet" type="text/css" href="/css/scroll.css">


<div class="container">

    <div class="row">
        <h4 class="text-center mt-5">Minhas negociações</h4>
                    <form method="GET" action="/MyTrades">
            
                        <div class="form-group">
                            <h5 for="coin">Filtrar por mercado:</h5>
                            <select class="form-control" id="coin" name="coin">
                                <option value="">Selecione um valor</option>
                                <option value="USDT">USDT</option>
                                <option value="ETH">ETH</option>
                                <option value="BTC">BTC</option>
                                <option value="SOL">SOL</option>
            
                                <!-- ... -->
                            </select>
                        </div>
                        <!--<div class="form-group">
                            <label for="type">Operação</label>
                            <select class="form-control" id="type" name="type">
                             
                                <option value=""></option>
                                <option value="buy">Comprar</option>
                                <option value="sell">Vender</option>
                                
                            </select>
                        </div>-->
            
                        <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
                    </form>
        </div>          
















        <div class="col-md-12 mt-3 mb-5">
            <div class="card cardTrade">

                <div class="card-title">
                    <h5>Negociações<h5>

                </div>
                <div class="card-body bodyCard">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">HORA (ano-mês-dia)</th>
                                <th scope="col">MERCADO</th>
                                <th scope="col">OPERAÇÃO</th>
                                <th scope="col">QUANTIDADE</th>
                                <th scope="col">VALOR PAGO</th>
                                <th scope="col">PREÇO</th>
                                <th scope="col">STATUS</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($trades as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($item['timestamp'])->toDateTimeString() }}</td>
                                        <td>{{ $item['pair'] }}</td>
                                        <td class="side {{ strtolower($item['side']) }}">{{ $item['side'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['total'] }}</td>
                                        <td>{{ $item['price'] }}</td>
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

@endsection