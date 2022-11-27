@extends('layouts.app')

@section('title', 'Editando: ' . Auth::user()->acesso)

@section('content')

@guest
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else
<div id="edit-create-container" class="col-md-6 offset-md-3">
    <h1>Edite as informações</h1>
    <form action="/users/update/{{Auth::user()->id}}" method="POST">
        @csrf
        @method('PUT')
        <div id="cursos-form" class="form-group">
            <label for="title">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ Auth::user()->name }}">
        </div>

        <div id="cursos-form" class="form-group">
            <label for="title">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
        </div>

        <div id="cursos-form" class="form-group">
            <label for="title">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ Auth::user()->cpf }}">
        </div>

        <div id="cursos-form" class="form-group">
            <label for="title">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{ Auth::user()->endereco }}">
        </div>




        <div class="form-group">
             <label for="title">Senha</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha">
        </div>



        @if(Auth::user()->acesso == 'Professor')
            <div id="cursos-form" class="form-group">
                <label for="title">Avatares:</label>
            </div>
            @if(Auth::user()->image == 'avatar0')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar0" checked>
                    <img src="/img/avatares/avatar0.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar0">
                    <img src="/img/avatares/avatar0.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar1')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar1" checked>
                    <img src="/img/avatares/avatar1.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar1">
                    <img src="/img/avatares/avatar1.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar2')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar2" checked>
                    <img src="/img/avatares/avatar2.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar2">
                    <img src="/img/avatares/avatar2.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar3')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar3" checked>
                    <img src="/img/avatares/avatar3.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar3">
                    <img src="/img/avatares/avatar3.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar4')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar4" checked>
                    <img src="/img/avatares/avatar4.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar4">
                    <img src="/img/avatares/avatar4.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar5')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar5" checked>
                    <img src="/img/avatares/avatar5.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar5">
                    <img src="/img/avatares/avatar5.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar6')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar6" checked>
                    <img src="/img/avatares/avatar6.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar6">
                    <img src="/img/avatares/avatar6.png">
                </div>
            @endif
            @if(Auth::user()->image == 'avatar7')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar7" checked>
                    <img src="/img/avatares/avatar7.png">
                </div>
            @else 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="image" value="avatar7">
                    <img src="/img/avatares/avatar7.png">
                </div>
            @endif
        @endif
        @if(Auth::user()->acesso == 'Aluno')
            <div id="cursos-form" class="form-group">
                <label for="title">Filmes:</label>
            </div>
            @if(Auth::user()->movie == 'nothing')
                <div class="form-check-curso">
                    <input class="form-check-input" type="radio" name="movie" value="nothing" checked> None
                    <label class="form-check-label"></label>
                </div>
            @else 
                <div class="form-check-curso">
                    <input class="form-check-input" type="radio" name="movie" value="nothing"> None
                    <label class="form-check-label"></label>
                </div>
            @endif
            @foreach ($movies as $movie)
                @if(Auth::user()->movie == $movie->title)
                    <div class="form-check-curso">
                        <input class="form-check-input" type="radio" name="movie" value="{{ $movie->title }}" checked> {{ $movie->title }}
                        <label class="form-check-label"></label>
                    </div>
                @else 
                    <div class="form-check-curso">
                        <input class="form-check-input" type="radio" name="movie" value="{{ $movie->title }}"> {{ $movie->title }}
                        <label class="form-check-label"></label>
                    </div>
                @endif
            @endforeach
        @endif



            <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>

@endguest

@endsection
