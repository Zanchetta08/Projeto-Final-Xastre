<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;

class CursoController extends Controller
{
    public function index(){

        $search = request('search');
        if($search){
            $cursos = Curso::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $cursos = Curso::paginate(4);
        }

        return view ("cursos.curso",['cursos'=> $cursos, 'search' => $search]);
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
        $curso->user_id = 99999999999;
       

        $curso->save();

        return redirect('/cursos')->with('msg', 'Curso criado com sucesso!');

    }

    public function show($id){
        $curso = Curso::findOrFail($id);
        $user = auth()->user();
        $cursoAsParticipant = $curso->users; 


        if(User::where('id', $curso->user_id)->exists()) {
            $cursoProfessor = User::where('id', $curso->user_id)->first();
            return view('cursos.show', ['curso' => $curso, 'cursoProfessor' => $cursoProfessor, 'cursoAsParticipant' => $cursoAsParticipant]);
        }else{
            $curso->user_id = 99999999999;
            $cursoProfessor = User::where('id', $curso->user_id)->first();
            return view('cursos.show', ['curso' => $curso, 'cursoProfessor' => $cursoProfessor, 'cursoAsParticipant' => $cursoAsParticipant]);
        }
    }

    public function destroy($id){
        Curso::findOrFail($id)->delete();
        $user = auth()->user();
        $user->cursosAsParticipant()->detach($id);

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

    public function joinCursoProf(Request $request){
        $user = auth()->user();
        Curso::findOrFail($request->id)->update(['user_id' => $user->id]);   

        return redirect('/cursos')->with('msg', 'Curso assumido com sucesso!');
    }

    public function joinCursoAluno($id){
        $user = auth()->user();
        $user->cursosAsParticipant()->attach($id);
        
        return redirect('/cursos')->with('msg', 'Sua presença está confirmada!');
    }

    public function leaveCursoAluno($id){
        $user = auth()->user();
        $user->cursosAsParticipant()->detach($id);

        return redirect('/cursos')->with('msg', 'Sua presença foi retirada!');
    }

    public function dashboard(){
        
        $user = auth()->user();
        $cursosAsParticipant = $user->cursosAsParticipant;

        return view('users.dashboard', ['cursosAsParticipant' => $cursosAsParticipant]);
    }
}
