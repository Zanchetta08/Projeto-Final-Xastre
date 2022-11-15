<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/show', [App\Http\Controllers\HomeController::class,'show']);
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class,'edit']);
Route::put('/home/update/{id}', [App\Http\Controllers\HomeController::class,'update']);
Route::delete('/home/{id}', [App\Http\Controllers\HomeController::class,'destroy']);



