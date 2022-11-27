<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    public function show(){

        return view ('users.show');
    } 

    public function edit(){

        $movies = Http::get("https://jsonplaceholder.typicode.com/posts");

        return view ('users.edit', ["movies" => json_decode($movies)]);
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        $user = auth()->user();
        $user->cursosAsParticipant()->detach($id);

        return redirect('/cursos')->with('msg','Perfil excluido com sucesso');
    } 

    public function update(Request $request){

        $user = User::findOrFail($request->id);
        if($user->acesso == 'Aluno'){
            if(is_null($request->password)){
                $user->update(['name' => $request->name, 'email' => $request->email, 'cpf' => $request->cpf, 'endereco' => $request->endereco, 'movie' => $request->movie]);
            }else{
                $user->update($request->all());
                $senha = $request->password;
                $user->update(['password' => Hash::make($senha)]);
            }
        }elseif($user->acesso == 'Professor'){
            if(is_null($request->password)){
                $user->update(['name' => $request->name, 'email' => $request->email, 'cpf' => $request->cpf, 'endereco' => $request->endereco, 'image' => $request->image]);
            }else{
                $user->update($request->all());
                $senha = $request->password;
                $user->update(['password' => Hash::make($senha)]);
            }
        }

        return redirect('/cursos')->with('msg', 'Perfil editado com sucesso');

    }   
     
}
