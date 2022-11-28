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
            @if($curso->user_id == 99999999999)
                <h3>Professor: Sem atribuição de professor até o momento! </h3>
            @else
                <h3>Professor: {{ $cursoProfessor->name }}</h3>
            @endif
            @if(Auth::user()->acesso == 'Secretaria' || Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Professor')
            <h3>Alunos:</h3>
            <ul id="lista-alunos">
                @if(count($cursoAsParticipant) == 0)
                    <li>Sem alunos matriculados</li>
                @endif
                @foreach($cursoAsParticipant as $aluno)
                    <li>Nome: {{$aluno->name}} - Nota: {{ $aluno->pivot->nota }}</li>
                @endforeach
            </ul>
            @endif
            <div class="buttons-container">
                @if(Auth::user()->acesso == 'Secretaria' || Auth::user()->acesso == 'Admin')
                    <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon> Editar</a>
                    <form action="/cursos/{{ $curso->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                    </form>    
                @endif
                @if((Auth::user()->acesso == 'Aluno' || Auth::user()->acesso == 'Admin') && $count == 0 && count($cursoAsParticipant) < $curso->maxAlunos && $curso->status == '1')
                    <form action="/cursos/joinA/{{$curso->id}}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Confirmar presença">
                    </form>
                @endif
                @if($curso->status == '1' && count($curso->users) < $curso->maxAlunos && (Auth::user()->acesso == 'Secretaria' || Auth::user()->acesso == 'Admin'))
                    <form action="/cursos/encerrarC/{{$curso->id}}" method="POST"> 
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-primary" value="Encerrar matriculas">
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endguest

@endsection