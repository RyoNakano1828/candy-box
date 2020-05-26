<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questionary;
use App\Models\Eat;
use App\Models\Emotion;
use App\Models\Hobby;
use App\Models\Personality;
use App\Models\Work;
use App\Models\Music;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class QuestionaryController extends Controller
{
    public function index(){
        return view('questionary.index');
    }

    public function form(){
        $eats = Eat::all();
        foreach ($eats as $eat) {
            echo $eat->name;
        }
        log::debug($eats);
        return view('questionary.form')->with('eats',$eats);
    }

    public function store(Request $req){
        log::debug($req->input('test'));
        log::debug($req->input('eat1'));
        log::debug($req->input('eat2'));
        log::debug($req->input('eat3'));
        $eats = Eat::all();
        $eat_info = '';
        foreach ($eats as $eat){
            if($req->input('eat'.$eat->id) == $eat->id){
                $eat_info .= $eat->id.'-';
            }
        }
        $eat_info = rtrim($eat_info, '-');
        log::debug($eat_info);
        // log::debug($req->input('bb'));
        // log::debug($req->input('cc'));
        log::debug('テストテスト');
        $questionary = new Questionary();
        $questionary->gender = 1;
        $questionary->age = 22;
        $questionary->height = 156;
        $questionary->weight = 43;
        $questionary->emotion_info = '1-2-3';
        $questionary->personality_info = '1-2-3';
        $questionary->hobby_info = '1-2-3';
        $questionary->eat_info = $eat_info;
        $questionary->music_info = '1-2-3';
        $questionary->work_info = '1-2-3';
        $questionary->save();

        return view('candybox.index');
    }
}
