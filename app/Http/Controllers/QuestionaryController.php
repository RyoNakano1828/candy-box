<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questionary;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class QuestionaryController extends Controller
{
    public function index(){
        return view('questionary.index');
    }

    public function form(){
        return view('questionary.form');
    }

    public function store(Request $req){
        log::debug($req->input('test'));
        log::debug($req->input('aa'));
        log::debug($req->input('bb'));
        log::debug($req->input('cc'));
        log::debug('テストテスト');
        $questionary = new Questionary();
        $questionary->gender = 1;
        $questionary->age = 22;
        $questionary->height = 156;
        $questionary->weight = 43;
        $questionary->emotion_info = '1-2-3';
        $questionary->personality_info = '1-2-3';
        $questionary->hobby_info = '1-2-3';
        $questionary->eat_info = '1-2-3';
        $questionary->music_info = '1-2-3';
        $questionary->work_info = '1-2-3';
        $questionary->save();

        return view('candybox.index');
    }
}
