<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ourMainController extends Controller
{
    public function homePage(){
        return '<h1>Home Page</h1> <a href="/about">Go to About page</a>';
    }

    public function aboutPage(){
        return '<h1>About Page</h1> <a href="/">Go to About page</a>';
    }
}
