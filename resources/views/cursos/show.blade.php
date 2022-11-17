@extends('layouts.app')

@section('title', $curso->nome )

@section('content')

@guest
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else

<div class="col-md10 offset-md-1">
    <div class="row">
        
        <div id="imagecurso-container" class="col-md-4">
            <img src="/img/cursos/{{ $curso->image }}.jpg" alt="">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{ $curso->nome }}</h1>
            <h3>Descrição Completa: {{ $curso->descricaoC }}</</h3>
            <div class="buttons-container">
                <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon> Editar</a>
                <form action="/cursos/{{ $curso->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endguest

@endsection