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

        Log::debug($req);

        $questionary = new Questionary();
        $questionary->gender = $req->input('gender');
        $questionary->age = $req->input('age');
        $questionary->money = $req->input('money');
        $questionary->margin = $req->input('margin');
        $questionary->it = $req->input('it');
        $questionary->plan = $req->input('plan');
        $questionary->impulse = $req->input('impulse');
        $questionary->cheap = $req->input('cheap');
        $questionary->repeat = $req->input('repeat');
        $questionary->sale = $req->input('sale');
        $questionary->sweet = $req->input('sweet');
        $questionary->spicy = $req->input('spicy');
        $questionary->sour = $req->input('sour');
        $questionary->salty = $req->input('salty');
        $questionary->stress = $req->input('stress');
        $questionary->sake = $req->input('sake');
        $questionary->work = $req->input('work');
        $questionary->guilty = $req->input('guilty');
        $questionary->new_item = $req->input('new_item');
        $questionary->ec_frequency = $req->input('ec_frequency');
        $questionary->eat_frequency = $req->input('eat_frequency');
        $questionary->sweets_time = $req->input('sweets_time');
        $questionary->family = $req->input('family');
        $questionary->family = $req->input('family');
        $questionary->save();
        $req->session()->put('questionary_id', $questionary->id);
        return redirect('/candybox');
    }
}
