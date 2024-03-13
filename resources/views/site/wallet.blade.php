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
                                <td>BRL  <img src="/img/icon/brl-icon.png"  width="30"> </td>
                                <td>{{ $saldo['BRL']['available'] }}</td>
                            </tr>
                            <tr>
                                <td>USDT<img src="/img/icon/USDT-icon.png"  width="30"> </td>
                                <td>{{ $saldo['USDT']['available'] }}</td>
                            </tr>
                            <tr>
                                <td>BTC <img src="/img/icon/btc-icon.png"  width="30"> </td>
                                <td>{{ $saldo['BTC']['available'] }}</td>
                            </tr>
                            <tr>
                                <td>ETH <img src="/img/icon/ETH-icon.png"  width="30"> </td>
                                <td>{{ $saldo['ETH']['available'] }}</td>
                            </tr>
                            <tr>
                                <td>SOL <img src="/img/icon/sol-icon.png"  width="30"> </td>
                                <td>{{ $saldo['SOL']['available'] }}</td>
                            </tr>

                            </tbody>
                        </table>
                    @endisset    
                </div>
            </div>
        </div>
    </div>
</div>
          



<script src="https://jsuites.net/v4/jsuites.js"></script>

@endsection
