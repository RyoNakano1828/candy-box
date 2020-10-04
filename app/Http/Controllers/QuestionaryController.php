<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questionary;
use App\Models\AfterQuestionary;


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

    /**
     * クライアントの使用端末がMobileかPCか判定
     *
     * @param $request
     * @return string
     * @access private
     */
    public function isMobileOrPc($request): string
    {
        $user_agent =  $request->header('User-Agent');
        if ((strpos($user_agent, 'iPhone') !== false)
            || (strpos($user_agent, 'iPod') !== false)
            || (strpos($user_agent, 'Android') !== false)) {
            return 'mobile';
        } else {
            return 'pc';
        }
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
        $questionary->device = $this->isMobileOrPc($req);
        $questionary->save();
        //回答者のIDをセッションに追加
        $req->session()->put('questionary_id', $questionary->id);
        return redirect('/candybox/category');
    }

    public function afterform(){
        return view('questionary.afterform');
    }

    public function afterstore(Request $req){
        Log::debug($req);

        $questionary_id = $req->session()->get('questionary_id');

        $after_questionary = new AfterQuestionary();
        $after_questionary->questionary_id = $questionary_id;
        $after_questionary->assessment = $req->input('assessment');
        $after_questionary->comment = $req->input('comment');
        $after_questionary->save();

        //sessionリセット
        $req->session()->flush();

        //サンクスページへ
        return redirect('/thanks');
    }
    public function thanks(){
        return view('questionary.thanks');
    }
}
