<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'show_registration']);

Route::post('/login', [UserController::class, 'show_login']);
Route::get('/login', [UserController::class, 'show_reg']);

Route::post('/index', [UserController::class, 'show_index'])->middleware('validator');

Route::get('/index', [UserController::class, 'show_index']);

Route::get('/logout', [UserController::class, 'logout']);
