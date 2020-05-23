<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionaryController extends Controller
{
    public function index(){
        return view('questionary.index');
    }

    public function form(){
        return view('questionary.form');
    }
}
