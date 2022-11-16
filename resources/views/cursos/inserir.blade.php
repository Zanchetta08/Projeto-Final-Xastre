@extends('layouts.app')
@section('title', 'Inserir Curso')
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3">
    <h1>Insira seu curso</h1>
    <form action="/cursos" method="POST">
     @csrf
        <div class="form-group">
            <label for="nome">Nome do curso: </label>
            <input type="text" class="form-control" id="title" name="nome" placeholder="Nome da materia">
        </div>
        <div class="form-group">
            <label for="descricaocompleta">descrição completa: </label>
            <input type="text" class="form-control" id="title" name="descricaoC" placeholder="Nome da materia">
        </div>
        <div class="form-group">
            <label for="descricaosimples">descrição simplificada: </label>
            <input type="text" class="form-control" id="title" name="descricaoS" placeholder="Nome da materia">
        </div>

        <input type="submit" class="btn btn-primary" value="Inserir curso">
    </form>
</div>

@endsection