@extends('layouts.app')

@section('title', 'Dashboard: ' . Auth::user()->name)

@section('content')

@guest
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else
@if(Auth::user()->acesso == 'Aluno')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Cursos que estou participando</h1>
    </div>
@elseif(Auth::user()->acesso == 'Professor')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Cursos que estou ministrando</h1>
    </div>
@endif
<div class="col-md-10 offset-md-1 dashboard-cursos-container">
@if(Auth::user()->acesso == 'Aluno')
    @if(count($cursosAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Nota</th>
                    <th scope="col">#</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($cursosAsParticipant as $curso)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1}}</td>
                        <td><a href="/cursos/{{ $curso->id }}">{{ $curso->nome }}</a></td>
                        <td>{{ count($curso->users) }}/{{ $curso->maxAlunos }}</td>
                        <td>{{ $curso->pivot->nota }}</td>
                        <td>
                            <form action="/cursos/leaveA/{{$curso->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon>Sair</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4 class="aviso">Você ainda não tem cursos a fazer, <a href="/cursos"class="btn btn-primary">confirme presença em algum</a></h4>
    @endif
@elseif(Auth::user()->acesso == 'Professor')
    @if(count($cursosAsProfessor) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursosAsProfessor as $curso)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1}}</td>
                        <td><a href="/cursos/{{ $curso->id }}">{{ $curso->nome }}</a></td>
                        <td>{{ count($curso->users) }}/{{ $curso->maxAlunos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="aviso">Você ainda não é professor de nenhum curso!</p>
    @endif
@endif

@endguest

@endsection