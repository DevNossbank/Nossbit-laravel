@extends('layout')
@section('title', 'Index')
@section('conteudo')

<link rel="stylesheet" type="text/css" href="/css/index.css">

<div>
    <div class="container">
        <video autoplay loop muted plays-inline class="background-clip">
            <source src="/img/Video.mp4" type="video/mp4">
        </video>

        <div class="content">
            <h1>Nossbit</h1>
            <h4>Se aventure no mundo crypto</h4>
            <br>
            <a href="">Negociar</a>
        </div>
    </div>
</div>

@endsection