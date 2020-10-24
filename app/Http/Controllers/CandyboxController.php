<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\Category;
use App\Models\Review;
use App\Models\Purchase;
use App\Models\SelectedCandy;
use App\Models\Transition;
use App\Models\Questionary;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CandyboxController extends Controller
{
    public function explanation(){
        return view('candybox.explanation');
    }

    //商品一覧
    public function index(Request $request)
    {
        //良さげな81商品
        // //1チョコ
        // $select_candy_list = [1,2,5,6,7,13,20,22,23];
        // //2スナック
        // $select_candy_list = array_merge($select_candy_list, [26,27,29,31,32,33,34,35,68]);
        // //4キャラメル・飴
        // $select_candy_list = array_merge($select_candy_list, [73,74,79,80,81,82,83,86,87]);
        // //5クッキー・おせんべい
        // $select_candy_list = array_merge($select_candy_list, [70,69,96,97,101,102,109,110,111]);
        // //3豆・ナッツ
        // $select_candy_list = array_merge($select_candy_list, [112,119,126,131,153,149,151,152,179]);
        // //6フルーツ
        // $select_candy_list = array_merge($select_candy_list, [113,114,125,130,144,146,166,167,168]);
        // //7おつまみ
        // $select_candy_list = array_merge($select_candy_list, [189,191,253,232,241,261,262,268,269]);
        // //8和菓子
        // $select_candy_list = array_merge($select_candy_list, [364,365,366,367,371,372,373,380,385]);
        // //9洋菓子・ケーキ
        // $select_candy_list = array_merge($select_candy_list, [386,387,391,392,393,404,407,408,409]);

        // $candies = Candy::whereIn('id',$select_candy_list)->get();

        //合計金額の計算
        /*
        $sum_cost = 0;
        foreach($candies as $candy){
            $sum_cost += $candy->price;
            // Log::debug($candy);
        }
        Log::debug("合計金額：".$sum_cost);
        */

        //購入者ID
        $questionary_id = $request->session()->get('questionary_id');

        //ランダムに9×9商品取得する(SelectedCandyから取得)
        $select_candy_list = SelectedCandy::where('questionary_id', $questionary_id)->pluck('candy_id');
        Log::debug("selected_candies:".$select_candy_list);
        $candies = Candy::whereIn('id',$select_candy_list)->get();

        $reviews = Review::all();
        $categories = Category::all();
        $url = config('filesystems.disks.s3.url');
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('reviews',$reviews)
                ->with('categories',$categories)
                ->with('url',$url);
    }

    //カテゴリ一覧
    public function category(Request $request)
    {
        $categories = Category::all();
        $url = config('filesystems.disks.s3.url');
        return view('candybox.category')
                ->with('categories',$categories)
                ->with('url',$url);
    }

    //***************************************
    // 日時の差を計算
    //***************************************
    public function time_diff($time_from, $time_to) 
    {
        // 日時差を秒数で取得
        $dif_time = $time_to - $time_from;
        // 時間単位の差
        // $dif_time = date("H:i:s", $dif);
        return "{$dif_time}";
    }

    public function store(Request $request)
    {
        //購入者ID
        $questionary_id = $request->session()->get('questionary_id');

        //購入商品情報を文字列に変換
        $purchase_list = $request->input("purcahse");
        $purchase_info = '';
        foreach($purchase_list as $candy){
            $purchase_info .= $candy['id'].'-';
        }
        $purchase_info = rtrim($purchase_info, '-');

        //画面遷移情報を文字列に変換
        $move_list = $request->input("movement");
        $move_info = '';
        foreach($move_list as $move){
            $move_info .= $move['id'].'-';
        }
        $move_info = rtrim($move_info, '-');

        //画面遷移時間情報を文字列に変換
        $time_list = $request->input("movement_time");
        $time_info = '';
        foreach($time_list as $time){
            $time_info .= $time['time'].'-';
        }
        $time_info = rtrim($time_info, '-');

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        $purchase->candy_info = $purchase_info;
        $purchase->page_info = $move_info;
        $purchase->time_info = $time_info;
        $purchase->save();
        
        Log::debug($move_list);
        Log::debug($time_list);

        $page_name = 'movecategory';
        $start_time = Questionary::where('id',$questionary_id)->get('created_at');
        Log::debug($start_time[0]);
        $from = strtotime($start_time[0]["created_at"]);
        $to = strtotime($time_list[0]["time"]);
        Log::debug($from);
        Log::debug($to);
        $stay_time = $this->time_diff($from, $to);
        Log::debug($stay_time); 

        for($i = 0; $i < count($move_list); $i++){
            Log::debug($i);
            $transition = new Transition();
            $transition->questionary_id = $questionary_id;
            $transition->page_name = $page_name;
            $transition->stay_time = $stay_time;
            $transition->transition_num = $i+1;
            $transition->next_action = $move_list[$i]['id'];
            $transition->save();

            if($i+1 < count($move_list)){
                $page_name = $move_list[$i]['id'];
                $from = strtotime($time_list[$i]['time']);
                $to = strtotime($time_list[$i+1]['time']);
                $stay_time = $this->time_diff($from, $to);
            }
        }

        $last_stay_time = $this->time_diff(strtotime($time_list[count($time_list)-1]["time"]),strtotime(now()));

        $transition = new Transition();
        $transition->questionary_id = $questionary_id;
        $transition->page_name = "checkcart";
        $transition->stay_time = $last_stay_time;
        $transition->transition_num = count($move_list)+1;
        $transition->next_action = "submit";
        $transition->save();

        //事後アンケートへ
        return response()->json(['url'=>url('/after_questionary/form')]);
    }

    //カテゴリ検索結果
    public function search(Request $req)
    {
        $searchCategory = $req->input('category_id');
        // $searchSort = $req->input('sort');
        // $searchKeyword = $req->input('keyword_id');
        
        $reviews = Review::all();
        $categories = Category::all();

        //良さげな81商品の時
        // $query = Candy::query();
        // //1チョコ
        // $select_candy_list = [1,2,5,6,7,13,20,22,23];
        // //2スナック
        // $select_candy_list = array_merge($select_candy_list, [26,27,29,31,32,33,34,35,68]);
        // //4キャラメル・飴
        // $select_candy_list = array_merge($select_candy_list, [73,74,79,80,81,82,83,86,87]);
        // //5クッキー・おせんべい
        // $select_candy_list = array_merge($select_candy_list, [70,69,96,97,101,102,109,110,111]);
        // //3豆・ナッツ
        // $select_candy_list = array_merge($select_candy_list, [112,119,126,131,153,149,151,152,179]);
        // //6フルーツ
        // $select_candy_list = array_merge($select_candy_list, [113,114,125,130,144,146,166,167,168]);
        // //7おつまみ
        // $select_candy_list = array_merge($select_candy_list, [189,191,253,232,241,261,262,268,269]);
        // //8和菓子
        // $select_candy_list = array_merge($select_candy_list, [364,365,366,367,371,372,373,380,385]);
        // //9洋菓子・ケーキ
        // $select_candy_list = array_merge($select_candy_list, [386,387,391,392,393,404,407,408,409]);

        // $query->whereIn('id',$select_candy_list);

        $url = config('filesystems.disks.s3.url');

        //購入者ID
        $questionary_id = $req->session()->get('questionary_id');

        if($searchCategory !== null && $searchCategory !== ''){
            //ランダムに9×9商品取得する(SelectedCandyから取得)
            $select_candy_list = SelectedCandy::where('questionary_id', $questionary_id)->where('category_id', $searchCategory)->pluck('candy_id');
            Log::debug("selected_and_category_candies:".$select_candy_list);
            $candies = Candy::whereIn('id',$select_candy_list)->get();
        }

        // if($searchKeyword !== null && $searchKeyword !== ''){
        //     $query->where('keyword_id', $searchKeyword);
        // }
        // if($searchSort == 1){
        //     $candies = $query->orderBy("price",  "ASC")->get();
        // }else if($searchSort == 2){
        //     $candies = $query->orderBy("price",  "DESC")->get();
        // }else if($searchSort == 3){
        //     $candies = $query->orderBy("score",  "ASC")->get();
        // }else if($searchSort == 4){
        //     $candies = $query->orderBy("score",  "DESC")->get();
        // }else{
        //     $candies = $query->orderBy("score",  "DESC")->get();
        // }
        
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('reviews',$reviews)
                ->with('categories',$categories)
                ->with('searchCategory',$searchCategory)
                ->with('url', $url);
    }
}
