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
            <h3>Alunos:</h3>
            <ul id="lista-alunos">
                @foreach($cursoAsParticipant as $aluno)
                    <li>Nome: {{$aluno->name}} - Nota: {{ $aluno->pivot->nota }}</li>
                @endforeach
            </ul>
            <div class="buttons-container">
                <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon> Editar</a>
                <form action="/cursos/{{ $curso->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                </form>    
                @if(Auth::user()->acesso == 'Professor' && $curso->user_id == 99999999999)
                    <form action="/cursos/joinP/{{$curso->id}}" method="POST"> 
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-primary" value="Assumir curso">
                    </form>
                @elseif(Auth::user()->acesso == 'Aluno' && $count == 0 && count($cursoAsParticipant) < $curso->maxAlunos)
                    <form action="/cursos/joinA/{{$curso->id}}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Confirmar presença">
                    </form>
                @elseif(Auth::user()->acesso == 'Professor' && $curso->user_id == Auth::user()->id)
                     <form action="/cursos/leaveP/{{$curso->id}}" method="POST"> 
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-primary" value="Desistir do curso">
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endguest

@endsection