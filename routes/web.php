<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ourMainController;

// user routes
Route::get('/',  [UserController::class, "showCorrectHomePage"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);

// post routes
Route::get('/create-post', [BlogController::class, "createPost"]);
Route::post('/create-post', [BlogController::class, "storePost"]);
Route::get('/post/{post}', [BlogController::class, "viewSinglePost"]);