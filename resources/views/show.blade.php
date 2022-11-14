@extends('layouts.app')

@section('content')

<div class="col-md10 offset-md-1">
    <div class="row">
        
        <div id="image-container" class="col-md-6">
            <img src="/img/avatares/{{ Auth::user()->image }}.png" alt="">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{ Auth::user()->name }}</h1>
            <h3>Email: {{ Auth::user()->email }}</</h3>
            <h3>CPF: {{ Auth::user()->cpf }}</</h3>
            <h3>Endereço: {{ Auth::user()->endereco }}</</h3>
        </div>
        <div>
            <a href="/home/edit/{{Auth::user()->id}}">Editar</a>
            <a href="#">Deletar</a>
    </div>


    </div>
</div>

@endsection
