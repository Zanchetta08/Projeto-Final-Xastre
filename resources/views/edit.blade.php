@extends('layouts.app')

@section('content')

<style>
body{

background-image: url(https://thumbs.dreamstime.com/b/dark-technology-background-vector-big-data-purple-digital-connection-high-wireless-texture-visualization-screen-wireframe-160622718.jpg);
}



.navbar-brand img {
width: 50px;
margin-left: -3rem;
}

.btn-primary{
background-color: #2a251f;
border: 2px solid #7f0072;
}


.btn-primary:hover{
background-color: #aa05a2;
border: 2px solid #171614;
}

h1 {
    color: aliceblue;

}
.form-group{
    color: aliceblue; 
}
</style>

<div id="edit-create-container" class="col-md-6 offset-md-3">
    <h1>Edite as informações</h1>
    <form action="/home/update/{{Auth::user()->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ Auth::user()->name }}">

        </div>

        <div class="form-group">
            <label for="title">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
        </div>

        <div class="form-group">
            <label for="title">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ Auth::user()->cpf }}">
        </div>

        <div class="form-group">
            <label for="title">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{ Auth::user()->endereco }}">
        </div>
        <div class="form-group">
             <label for="title">Senha</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha">
        </div>
        <input type="submit" class="btn btn-primary" value="Salvar informações">
    </form>
</div>

@endsection
