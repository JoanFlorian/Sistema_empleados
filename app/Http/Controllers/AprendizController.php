<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index(){
        return view('aprendiz.index');
    }
}
