<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return view ('show');
    } 

    public function edit(){

        return view ('edit');
    }

    

    public function update(Request $request){
        User::findOrFail($request->id)->update($request->all());

        return redirect('/home');
    }   
}
