<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ourMainController;
use App\Http\Controllers\UserController;

Route::get('/',  [UserController::class, "showCorrectHomePage"]);
Route::get('/about', [ourMainController::class, "aboutPage"] );
Route::get('/singlePost', [ourMainController::class, "singlePost"] );

// post request
Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);