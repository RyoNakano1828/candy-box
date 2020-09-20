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

    public function index(Request $request){
        //ランダムに30件取得
        $candies = Candy::limit(12)->get();
        $reviews = Review::all();
        $categories = Category::all();
        $url = config('filesystems.disks.s3.url');
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('reviews',$reviews)
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

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        $purchase->candy_info = $purchase_info;
        $purchase->page_info = $move_info;
        $purchase->save();
        //事後アンケートへ
        return response()->json(['url'=>url('/after_questionary/form')]);
    }

    public function search(Request $req)
    {
        $searchCategory = $req->input('category_id');
        $searchSort = $req->input('sort');
        $searchKeyword = $req->input('keyword_id');
        
        $reviews = Review::all();
        $categories = Category::all();
        $query = Candy::query();
        $url = config('filesystems.disks.s3.url');
        Log::debug($url);
    
        if($searchCategory !== null && $searchCategory !== ''){
            $query->where('category_id', $searchCategory);
        }
        if($searchKeyword !== null && $searchKeyword !== ''){
            $query->where('keyword_id', $searchKeyword);
        }
        if($searchSort == 1){
            $candies = $query->orderBy("price",  "ASC")->get();
        }else if($searchSort == 2){
            $candies = $query->orderBy("price",  "DESC")->get();
        }else if($searchSort == 3){
            $candies = $query->orderBy("score",  "ASC")->get();
        }else if($searchSort == 4){
            $candies = $query->orderBy("score",  "DESC")->get();
        }else{
            $candies = $query->orderBy("score",  "DESC")->get();
        }
        
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('reviews',$reviews)
                ->with('categories',$categories)
                ->with('keywords',$keywords)
                ->with('searchCategory',$searchCategory)
                ->with('searchSort', $searchSort)
                ->with('searchKeyword', $searchKeyword)
                ->with('url', $url);
    }
}
