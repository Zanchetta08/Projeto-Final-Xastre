@extends('layouts.app')


@section('title', 'Cursos')

@section('content')

@guest
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else
<div id="search-container" class="col-md-12">
    <h1>Busque por um curso</h1>
    <form action="/cursos" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="cursos-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2><br> 
    @else
        <h2>Cursos</h2><br>  
    @endif
    <div id="cards-container" class="row">
        @foreach($cursos as $curso)
        <div class="card col-md-3">
            <img src="/img/cursos/{{ $curso->image }}.jpg">
            <div class="card-body">
                <h5 class="card-title">{{ $curso->nome }}</h5>
                <h6>{{ $curso->descricaoS}}</h6>
                <br>
                @if(count($curso->users) < $curso->minAlunos && $curso->status == '1')
                    <h6>Matrículas Abertas - Mínimo de alunos não atingido!</h6>
                @elseif(count($curso->users) >= $curso->minAlunos && count($curso->users) < $curso->maxAlunos && $curso->status == '1') 
                    <h6>Matrículas Abertas - Curso acontecerá!</h6>
                @else
                    <h6>Matrículas Encerradas</h6>
                @endif
                <p class="card-participants"> {{ count($curso->users) }} Participantes</p>
                <a href="/cursos/{{ $curso->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($cursos) == 0 && $search)
            <p class="aviso">Não foi possível encontrar nenhum curso com: {{ $search }}! <a href="/cursos">Ver todos</a></p>
        @elseif(count($cursos) == 0)
            <p class="aviso">Não há cursos disponíveis</p>
        @endif
    </div>
</div>
@if(!$search)
    <div class="d-flex justify-content-center">
        {{$cursos->links()}}
    </div>
@endif
@endguest


@endsection