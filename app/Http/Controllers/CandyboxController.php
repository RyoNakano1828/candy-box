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

class CandyboxController extends Controller
{
    public function index(Request $request){
        $candies = Candy::all();
        $reviews = Review::all();
        $categories = Category::all();

        $carts = [];
        $carts = $request->session()->get('candy_list');

        $data = $request->session()->all();
        log::debug($data);
        
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('carts',$carts);
    }

    public function add(Request $request)
    {
        $candies = Candy::all();
        $candy_id = '';
        $candy_id .= $request->session()->get('page_info').'-'.$request->post('candy_id');
        $request->session()->put('page_info', $candy_id);
        $request->session()->push('candy_list', $request->post('candy_id'));
        $carts = $request->session()->get('candy_list');

        $data = $request->session()->all();
        log::debug($data);
        
        Session::flash('message', 'カートに追加しました!');
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('carts',$carts);
    }

    public function delete(Request $request)
    {
        $candies = Candy::all();
        // $request->delete('candy_id');
        $candy_list = $request->session()->get('candy_list');
        if($candy_list){
            foreach($candy_list as $key => $candy){
                if ($candy == $request->post('candy_id')){
                    // echo $request->post('candy_id');
                    unset($candy_list[$key]);
                }
            }
        }
        $request->session()->forget('candy_list');
        foreach($candy_list as $candy){
            $request->session()->push('candy_list', $candy);
        }
        $carts = $request->session()->get('candy_list');
        $data = $request->session()->all();
        log::debug($data);
        
        Session::flash('message', '削除しました!');
        return redirect('/candybox')
                ->with('candies',$candies)
                ->with('carts',$carts);

    }

    public function store(Request $request)
    {
        $page_info = $request->session()->get('page_info');
        $page_info = ltrim($page_info, '-');
        $questionary_id = $request->session()->get('questionary_id');
        $candy_list = $request->session()->get('candy_list');
        $candy_info = '';
        foreach($candy_list as $candy){
            $candy_info .= $candy.'-';
        }
        $candy_info = rtrim($candy_info, '-');

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        $purchase->candy_info = $candy_info;
        $purchase->page_info = $page_info;
        $purchase->timestamps = false;
        $purchase->save();
        $request->session()->flush();

        return redirect('/questionary')->with('flash_message', 'アンケートが完了しました');
    }
}
