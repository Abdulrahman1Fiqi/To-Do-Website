<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'registerForm']);
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::post('logout',[AuthController::class,'logout']);


Route::middleware('auth')->group(function(){
    Route::resource('todos',TodoController::class);
});
