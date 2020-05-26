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
use App\Models\Candy;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class QuestionaryController extends Controller
{
    public function index(){
        return view('questionary.index');
    }

    public function form(){
        $eats = Eat::all();
        $emotions = Emotion::all();
        $hobbies = Hobby::all();
        $personalities = Personality::all();
        $works = Work::all();
        $musics = Music::all();
        // foreach ($eats as $eat) {
        //     echo $eat->name;
        // }
        return view('questionary.form')
                ->with('eats',$eats)
                ->with('emotions',$emotions)
                ->with('hobbies',$hobbies)
                ->with('personalities',$personalities)
                ->with('works',$works)
                ->with('musics',$musics);
    }

    public function store(Request $req){

        $candies = Candy::all();

        $gender = $req->input('gender');
        $age = $req->input('age');
        $height = $req->input('height');
        $weight = $req->input('weight');

        $eats = Eat::all();
        $eat_info = '';
        foreach ($eats as $eat){
            if($req->input('eat'.$eat->id) == $eat->id){
                $eat_info .= $eat->id.'-';
            }
        }
        $eat_info = rtrim($eat_info, '-');

        $emotions = Emotion::all();
        $emotion_info = '';
        foreach ($emotions as $emotion){
            if($req->input('emotion'.$emotion->id) == $emotion->id){
                $emotion_info .= $emotion->id.'-';
            }
        }
        $emotion_info = rtrim($emotion_info, '-');

        $hobbies = Hobby::all();
        $hobby_info = '';
        foreach ($hobbies as $hobby){
            if($req->input('hobby'.$hobby->id) == $hobby->id){
                $hobby_info .= $hobby->id.'-';
            }
        }
        $hobby_info = rtrim($hobby_info, '-');

        $personalities = Personality::all();
        $personality_info = '';
        foreach ($personalities as $personality){
            if($req->input('personality'.$personality->id) == $personality->id){
                $personality_info .= $personality->id.'-';
            }
        }
        $personality_info = rtrim($personality_info, '-');

        $works = Work::all();
        $work_info = '';
        foreach ($works as $work){
            if($req->input('work'.$work->id) == $work->id){
                $work_info .= $work->id.'-';
            }
        }
        $work_info = rtrim($work_info, '-');

        $musics = Music::all();
        $music_info = '';
        foreach ($musics as $music){
            if($req->input('music'.$music->id) == $music->id){
                $music_info .= $music->id.'-';
            }
        }
        $music_info = rtrim($music_info, '-');
        log::debug($eat_info);
        log::debug('テストテスト');


        $questionary = new Questionary();
        $questionary->gender = $gender;
        $questionary->age = $age;
        $questionary->height = $height;
        $questionary->weight = $weight;
        $questionary->emotion_info = $emotion_info;
        $questionary->personality_info = $personality_info;
        $questionary->hobby_info = $hobby_info;
        $questionary->eat_info = $eat_info;
        $questionary->music_info = $music_info;
        $questionary->work_info = $work_info;
        $questionary->save();

        $req->session()->put('questionary_id', $questionary->id);

        return redirect('/candybox');
    }
}
