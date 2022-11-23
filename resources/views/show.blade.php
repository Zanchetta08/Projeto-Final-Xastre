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
    background-image: radial-gradient(circle, #811478, #781173, #700f6e, #670c68, #5f0963);
border: 2px solid #7f0072;
}


.btn-primary:hover{
    background-image: radial-gradient(circle, #811478, #781173, #700f6e, #670c68, #5f0963);
border: 2px solid #171614;
}
#info-container{
    background-image: radial-gradient(circle, #ffffff, #efefef, #dfdfdf, #cfcfcf, #c0c0c0);
    border-radius: 15px;
}
</style>



<div class="col-md10 offset-md-1">
    <div class="row">
        
        <div id="image-container" class="col-md-6">
            <img src="/img/avatares/{{ Auth::user()->image }}.png" alt="">
        </div>

        <div id="info-container" class="col-md-5">
            <h1>{{ Auth::user()->name }}</h1>
            <h3>Email: {{ Auth::user()->email }}</</h3>
            <h3>CPF: {{ Auth::user()->cpf }}</</h3>
            <h3>Endereço: {{ Auth::user()->endereco }}</</h3>
            <a href="/home/edit/{{Auth::user()->id}}"class="btn btn-primary">Editar</a>
            <a href="#"class="btn btn-primary">Deletar</a>
        </div>
        <div>
            <a href="/home/edit/{{Auth::user()->id}}">Editar</a>
            <a href="#">Deletar</a>
    </div>


    </div>
</div>

@endsection
