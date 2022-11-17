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
        $curso->descricaoC = $request->descricaoC;
        $curso->descricaoS = $request->descricaoS;
        $curso->minAlunos = $request->minAlunos;
        $curso->maxAlunos = $request->maxAlunos;
        $curso->image = $request->image;
       

        $curso->save();

        return redirect('/cursos')->with('msg', 'Curso criado com sucesso!');

    }

    public function show($id){
        
        $curso = Curso::findOrFail($id);

        return view ('cursos.show', ['curso' => $curso]);
    }

    public function destroy($id){
        
        Curso::findOrFail($id)->delete();

        return redirect('/cursos')->with('msg', 'Curso excluído com sucesso!');
    }

    public function edit($id){

        $curso = Curso::findOrFail($id);

        return view('cursos.edit', ['curso' => $curso]);
    }

    public function update(Request $request){
        Curso::findOrFail($request->id)->update($request->all());

        return redirect('/cursos')->with('msg', 'Curso editado com sucesso!');
    }  
}
