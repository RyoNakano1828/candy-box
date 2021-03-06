<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questionary;
use App\Models\AfterQuestionary;
use App\Models\Candy;
use App\Models\SelectedCandy;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Input;

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
        $inputs = $req->all();

        // validation ここから追加
        $rules = [
            'age' => ['required'],
            'how_many' => ['required'],
            'Q1' => ['required'],
            'Q2' => ['required'],
            'Q3' => ['required'],
            'Q3' => ['required'],
            'Q4' => ['required'],
            'Q5' => ['required'],
            'Q6' => ['required'],
            'Q7' => ['required'],
            'Q8' => ['required'],
            'Q9' => ['required'],
            'Q10' => ['required'],
            'Q11' => ['required'],
            'Q12' => ['required'],
            'Q13' => ['required'],
            'Q14' => ['required'],
            'Q15' => ['required'],
            'Q16' => ['required'],
            'Q17' => ['required'],
            'Q18' => ['required'],
            'Q19' => ['required'],
            'Q20' => ['required'],
            'Q21' => ['required'],
        ];
        
        $validation = \Validator::make($inputs,$rules);
        //if fails
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $questionary = new Questionary();
        $questionary->gender = $req->input('gender');
        $questionary->how_many = $req->input('how_many');
        $questionary->age = $req->input('age');
        $questionary->Q1 = $req->input('Q1');
        $questionary->Q2 = $req->input('Q2');
        $questionary->Q3 = $req->input('Q3');
        $questionary->Q4 = $req->input('Q4');
        $questionary->Q5 = $req->input('Q5');
        $questionary->Q6 = $req->input('Q6');
        $questionary->Q7 = $req->input('Q7');
        $questionary->Q8 = $req->input('Q8');
        $questionary->Q9 = $req->input('Q9');
        $questionary->Q10 = $req->input('Q10');
        $questionary->Q11 = $req->input('Q11');
        $questionary->Q12 = $req->input('Q12');
        $questionary->Q13 = $req->input('Q13');
        $questionary->Q14 = $req->input('Q14');
        $questionary->Q15 = $req->input('Q15');
        $questionary->Q16 = $req->input('Q16');
        $questionary->Q17 = $req->input('Q17');
        $questionary->Q18 = $req->input('Q18');
        $questionary->Q19 = $req->input('Q19');
        $questionary->Q20 = $req->input('Q20');
        $questionary->Q21 = $req->input('Q21');
        $questionary->device = $this->isMobileOrPc($req);
        $questionary->save();
        //回答者のIDをセッションに追加
        $req->session()->put('questionary_id', $questionary->id);

        //ランダムに9×9商品取得する
        for($i=0; $i<9; $i++){
            $query = Candy::query();
            $query->where('category_id',$i+1)->inRandomOrder()->limit(12);
            $candies = $query->get();
            //Log::debug($candies);
            foreach($candies as $candy){
                $selected_candy = new SelectedCandy();
                $selected_candy->questionary_id = $questionary->id;
                $selected_candy->candy_id = $candy->id;
                $selected_candy->category_id = $i+1;
                $selected_candy->save();
            }
        }
        return redirect('/candybox/category');
    }

    public function afterform(){
        return view('questionary.afterform');
    }

    public function afterstore(Request $req){
        Log::debug($req);

        $inputs = $req->all();

        // validation ここから追加
        $rules = [
            'assessment' => ['required'],
            'indecisive' => ['required'],
            'consent' => ['required'],
        ];
        
        $validation = \Validator::make($inputs,$rules);
        //if fails
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $questionary_id = $req->session()->get('questionary_id');

        $after_questionary = new AfterQuestionary();
        $after_questionary->questionary_id = $questionary_id;
        //使いやすさ
        $after_questionary->assessment = $req->input('assessment');
        $after_questionary->assessment_reason = $req->input('assessment_reason');
        //迷ったか
        $after_questionary->indecisive = $req->input('indecisive');
        $after_questionary->indecisive_reason = $req->input('indecisive_reason');
        //満足度
        $after_questionary->consent = $req->input('consent');
        $after_questionary->consent_reason = $req->input('consent_reason');
        //謝礼用メールアドレス
        $after_questionary->mail_address = $req->input('mail_address');
        $after_questionary->save();

        //sessionリセット
        $req->session()->flush();

        //サンクスページへ
        return redirect('/thanks');
    }
    public function thanks(){
        $url = config('filesystems.disks.s3.url');

        return view('questionary.thanks')
            ->with('url', $url);
    }
}
