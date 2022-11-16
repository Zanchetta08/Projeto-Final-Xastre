<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::All();
        return view ("cursos.curso",['cursos'=> $cursos]);

    }

    public function create(){
        return view ("cursos.inserir");

    }

    public function store(Request $request) {

        $curso = new Curso;

        $curso->nome = $request->nome;
        $curso->descricaodetalhada = $request->descricaoC;
        $curso->descricaosimples = $request->descricaoS;
       

        $curso->save();

        return redirect('/');
    
    }
}
