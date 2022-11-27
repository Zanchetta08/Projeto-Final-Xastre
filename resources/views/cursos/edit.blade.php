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





        
        @if(count($curso->users) < $curso->maxAlunos)
            <div id="cursos-form" class="form-group">
                <label for="nome">Inserir alunos: </label>
            </div>
            @foreach($users as $user)
                    @if($user->acesso == 'Aluno')
                        <div class="form-check-curso">
                            <input class="form-check-input" type="checkbox" id="check" name="option[]" value="{{ $user->id }}"> {{ $user->name }}
                            <label class="form-check-label"></label> 
                        </div>
                    @endif
            @endforeach
        @endif




        <div id="cursos-form" class="form-group">
            <label for="title">Escolher professor: </label>
        </div>
        @if($curso->user_id == 99999999999)
            <div class="form-check-curso">
                <input class="form-check-input" type="radio" name="user_id" value="99999999999" checked> None
                <label class="form-check-label"></label> 
            </div>
        @else
            <div class="form-check-curso">
                <input class="form-check-input" type="radio" name="user_id" value="99999999999"> None
                <label class="form-check-label"></label> 
            </div>
        @endif
        @foreach ($users as $user)
            @if($user->acesso == 'Professor')
                @if($curso->user_id == $user->id)
                    <div class="form-check-curso">
                        <input class="form-check-input" type="radio" name="user_id" value="{{ $user->id }}" checked> {{ $user->name }}
                        <label class="form-check-label"></label> 
                    </div>
                @else
                    <div class="form-check-curso">
                        <input class="form-check-input" type="radio" name="user_id" value="{{ $user->id }}"> {{ $user->name }}
                        <label class="form-check-label"></label> 
                    </div>
                @endif
            @endif
        @endforeach
        <div id="cursos-form" class="form-group">
            <label for="title">Editar notas: </label>
                @foreach($cursoAsParticipant as $aluno)
                    <div class="row">
                            <label for="title">{{$aluno->name}}: </label>
                            <input type="text" class="form-control" id="title" name="nota[]" value="{{ $aluno->pivot->nota }}">
                    </div>
                @endforeach
        </div>
        <input type="submit" class="btn btn-primary" value="Editar curso">
    </form>
</div>


@endguest

@endsection