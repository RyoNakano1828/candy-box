<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\Category;
use App\Models\Review;
use App\Models\Purchase;

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
        //1チョコ
        $select_candy_list = [1,2,5,6,7,13,20,22,23];
        //2スナック
        $select_candy_list = array_merge($select_candy_list, [26,27,29,31,32,33,34,35,68]);
        //4キャラメル・飴
        $select_candy_list = array_merge($select_candy_list, [73,74,79,80,81,82,83,86,87]);
        //5クッキー・おせんべい
        $select_candy_list = array_merge($select_candy_list, [70,69,96,97,101,102,109,110,111]);
        //3豆・ナッツ
        $select_candy_list = array_merge($select_candy_list, [112,119,126,131,153,149,151,152,179]);
        //6フルーツ
        $select_candy_list = array_merge($select_candy_list, [113,114,125,130,144,146,166,167,168]);
        //7おつまみ
        $select_candy_list = array_merge($select_candy_list, [189,191,253,232,241,261,262,268,269]);
        //8和菓子
        $select_candy_list = array_merge($select_candy_list, [364,365,366,367,371,372,373,380,385]);
        //9洋菓子・ケーキ
        $select_candy_list = array_merge($select_candy_list, [386,387,391,392,393,404,407,408,409]);

        $candies = Candy::whereIn('id',$select_candy_list)->get();
        // $candies = Candy::where('category_id',9)->get();
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

    public function store(Request $request)
    {
        Log::debug($request->input("purcahse"));

        //購入者ID
        $questionary_id = $request->session()->get('questionary_id');

        //購入商品情報を文字列に変換
        $purchase_list = $request->input("purcahse");
        $purchase_info = '';
        foreach($purchase_list as $candy){
            $purchase_info .= $candy['id'].'-';
        }
        $purchase_info = rtrim($purchase_info, '-');
        Log::debug($purchase_info);

        //画面遷移情報を文字列に変換
        $move_list = $request->input("movement");
        $move_info = '';
        foreach($move_list as $move){
            $move_info .= $move['id'].'-';
        }
        $move_info = rtrim($move_info, '-');
        Log::debug($move_info);

        //画面遷移時間情報を文字列に変換
        $time_list = $request->input("movement_time");
        $time_info = '';
        foreach($time_list as $time){
            $time_info .= $time['time'].'-';
        }
        $time_info = rtrim($time_info, '-');
        Log::debug($time_info);

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        $purchase->candy_info = $purchase_info;
        $purchase->page_info = $move_info;
        $purchase->time_info = $time_info;
        $purchase->save();
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
        $query = Candy::query();
        //1チョコ
        $select_candy_list = [1,2,5,6,7,13,20,22,23];
        //2スナック
        $select_candy_list = array_merge($select_candy_list, [26,27,29,31,32,33,34,35,68]);
        //4キャラメル・飴
        $select_candy_list = array_merge($select_candy_list, [73,74,79,80,81,82,83,86,87]);
        //5クッキー・おせんべい
        $select_candy_list = array_merge($select_candy_list, [70,69,96,97,101,102,109,110,111]);
        //3豆・ナッツ
        $select_candy_list = array_merge($select_candy_list, [112,119,126,131,153,149,151,152,179]);
        //6フルーツ
        $select_candy_list = array_merge($select_candy_list, [113,114,125,130,144,146,166,167,168]);
        //7おつまみ
        $select_candy_list = array_merge($select_candy_list, [189,191,253,232,241,261,262,268,269]);
        //8和菓子
        $select_candy_list = array_merge($select_candy_list, [364,365,366,367,371,372,373,380,385]);
        //9洋菓子・ケーキ
        $select_candy_list = array_merge($select_candy_list, [386,387,391,392,393,404,407,408,409]);

        $query->whereIn('id',$select_candy_list);
        $url = config('filesystems.disks.s3.url');
    
        if($searchCategory !== null && $searchCategory !== ''){
            $candies = $query->where('category_id', $searchCategory)->get();
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
