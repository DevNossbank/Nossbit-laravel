@extends('layouts.app')
@section('title', 'My Wallet')
@section('content') 
<link rel="stylesheet" type="text/css" href="/css/generalStyles.css">
<link rel="stylesheet" type="text/css" href="/css/card.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">


<div class="container">
    <div class="row">
        <h4 class="text-center mt-4">Minha carteira</h4>
        <div class="col-md-12 mt-3 mb-5">
            <div class="card cardTrade">
                <div class="card-title">
                    <h4>Moedas</h4>
                    <p>Sua lista de moedas para efetuar trocas e realizar saques</p>
                </div>
                <div class="card-body bodyCard">
                    <!-- Exibição do Saldo --> 
                  

                    @isset($saldo['USDT'])
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">MOEDAS</th>
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
    </div>
</div>

@endsection
