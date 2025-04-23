<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ourMainController;

Route::get('/',  [ourMainController::class, "homePage"]);
Route::get('/about', [ourMainController::class, "aboutPage"] );
Route::get('/singlePost', [ourMainController::class, "singlePost"] );
