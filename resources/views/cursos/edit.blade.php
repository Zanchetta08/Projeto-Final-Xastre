@extends('layouts.app')

@section('title', 'Editando:' . $curso->nome)

@section('content')

@guest
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else
<div id="cursos-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $curso->nome }}</h1>
    <form action="/cursos/update/{{ $curso->id }}" method="POST">
     @csrf
     @method('PUT')
        <div id="cursos-form" class="form-group">
            <label for="nome">Nome do curso: </label>
            <input type="text" class="form-control" id="title" name="nome" placeholder="Nome do curso:" value="{{ $curso->nome }}">
        </div>
        <div id="cursos-form" class="form-group">
            <label for="descricaocompleta">Descrição completa: </label>
            <textarea type="text" class="form-control" id="title" name="descricaoC" rows="3" placeholder="Descrição completa do curso:">{{ $curso->descricaoC }}</textarea>
        </div>
        <div id="cursos-form" class="form-group">
            <label for="descricaosimples">Descrição simplificada: </label>
            <input type="text" class="form-control" id="title" name="descricaoS" placeholder="Descrição simplificada do curso:" value="{{ $curso->descricaoS }}">
        </div>
        <div id="cursos-form" class="form-group">
            <label for="minAlunos">Mínimo de alunos para o curso acontecer (1 a 100):</label><br>
            <input type="number" id="quantity" class="form-control" name="minAlunos" min="1" max="100" value="{{ $curso->minAlunos }}">
        </div>
        <div id="cursos-form" class="form-group">
            <label for="maxAlunos">Máximo de alunos desse curso (1 a 100):</label><br>
            <input type="number" id="quantity" class="form-control" name="maxAlunos" min="1" max="100" value="{{ $curso->maxAlunos }}">
        </div>
        <div id="cursos-form" class="form-group">
            <label for="img">Escolha uma imgem para esse curso:</label>
        </div>
        @if($curso->image == 'curso1')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso1" checked>
                <img src="/img/cursos/curso1.jpg">
            </div>
        @else 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso1">
                <img src="/img/cursos/curso1.jpg">
            </div>
        @endif
        @if($curso->image == 'curso2')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso2" checked>
                <img src="/img/cursos/curso2.jpg">
            </div>
        @else
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso2">
                <img src="/img/cursos/curso2.jpg">
            </div>
        @endif
        @if($curso->image == 'curso3')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso3" checked>
                <img src="/img/cursos/curso3.jpg">
            </div>
        @else 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso3">
                <img src="/img/cursos/curso3.jpg">
            </div>
        @endif
        @if($curso->image == 'curso4')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso4" checked>
                <img src="/img/cursos/curso4.jpg">
            </div>
        @else
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso4">
                <img src="/img/cursos/curso4.jpg">
            </div>
        @endif
        @if($curso->image == 'curso5')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso5" checked>
                <img src="/img/cursos/curso5.jpg">
            </div>
        @else 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image" value="curso5">
                <img src="/img/cursos/curso5.jpg">
            </div>
        @endif
        <input type="submit" class="btn btn-primary" value="Editar curso">
    </form>
</div>


@endguest

@endsection