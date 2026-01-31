<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect('/todos');
});

Route::get('/register',[AuthController::class,'registerForm']);
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('/todos',TodoController::class);
Route::middleware('auth')->group(function(){
                
});
