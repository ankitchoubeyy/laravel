<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\followController;
use App\Http\Controllers\ourMainController;

// user routes
Route::get('/',  [UserController::class, "showCorrectHomePage"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);
Route::get('/profile/{username}', [UserController::class, "profile"]);

// post routes
Route::get('/create-post', [BlogController::class, "createPost"]);
Route::post('/create-post', [BlogController::class, "storePost"]);
Route::get('/post/{post}', [BlogController::class, "viewSinglePost"]);
Route::delete('/post/{post}', [BlogController::class, "deletePost"]);

//  follow controller
Route::post('/create-follow/{user:username}', [followController::class, 'createFollow']);
Route::post('/remove-follow/{user:username}', [followController::class, 'removeFollow']);