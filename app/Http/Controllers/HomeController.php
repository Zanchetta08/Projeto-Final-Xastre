<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\Hash;

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
    public function index()
    {
        return view('home');
    }
     
    public function show(){

        return view ('users.show');
    } 

    public function edit(){

        return view ('users.edit');
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        $user = auth()->user();
        $user->cursosAsParticipant()->detach($id);

        return redirect('/home')->with('msg','Perfil excluido com sucesso');
    } 

    public function update(Request $request){
        $senha = $request->password;
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        $user->update(['password' => Hash::make($senha)]);

         
        return redirect('/home');


    }   
}
