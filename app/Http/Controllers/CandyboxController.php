<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandyboxController extends Controller
{
    public function index(){
        return view('candybox.index');
    }
}
