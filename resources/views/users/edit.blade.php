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
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>

@endguest

@endsection
