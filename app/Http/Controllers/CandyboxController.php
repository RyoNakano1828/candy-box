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
    public function index(Request $request){
        $candies = Candy::all();
        $reviews = Review::all();
        $categories = Category::all();

        $url = config('filesystems.disks.s3.url');
        log::debug($url);

        // $data = $request->session()->all();
        // log::debug($data);
        
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
        //購入商品
        $purchase_list = $request->input("purcahse");
        //画面遷移情報
        $move_list = $request->input("movement");
        // $page_info = ltrim($page_info, '-');
        $candy_info = '';
        // foreach($candy_list as $candy){
        //     $candy_info .= $candy.'-';
        // }
        // $candy_info = rtrim($candy_info, '-');

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        // $purchase->candy_info = $candy_info;
        $purchase->candy_info = "test";
        // $purchase->page_info = $page_info;
        $purchase->page_info = "test";
        $purchase->timestamps = false;
        $purchase->save();
        $request->session()->flush();
        return response()->json(['url'=>url('/questionary')]);
    }

    public function search(Request $req)
    {
        $searchCategory = $req->input('category_id');
        $searchSort = $req->input('sort');
        $searchFreeword = $req->input('freeword');
        
        $reviews = Review::all();
        $categories = Category::all();
        $query = Candy::query();

        $url = config('filesystems.disks.s3.url');
        
        if($searchCategory !== null && $searchCategory !== ''){
            $query->where('category_id', $searchCategory);
        }
        if($searchFreeword !== null){
            $query->where('name', 'like', '%'.$searchFreeword.'%');
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
                ->with('searchCategory',$searchCategory)
                ->with('searchSort', $searchSort)
                ->with('searchFreeword', $searchFreeword)
                ->with('url', $url);
    }
}
