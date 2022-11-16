@extends('layouts.app')

@section('title', 'Home')

@foreach($cursos as $curso)

            <h2>{{$curso->nome}}</h2>
            <p>{{$curso->descrição_simples}}</p>
            <p>{{$curso->descrição_detalhada}}</p>
            <p>{{$curso->numero_maximo_de_alunos}}</p>


@endforeach

@section('content')

@endsection