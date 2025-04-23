<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ourMainController extends Controller
{
    public function homePage(){
        $name = 'Aman';
        return view("home", ['name' => $name]);
    }

    public function aboutPage(){
        $animalsList = ['lion', 'Tiger', 'Elephant'];
        return view("about", ['animals' => $animalsList]);
    }
}
