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
        $candy_id .= $request->session()->get('candy_info').'-'.$request->post('candy_id');
        $request->session()->put('candy_info', $candy_id);
        $request->session()->push('candy_list', $request->post('candy_id'));
        $carts = $request->session()->get('candy_list');

        $data = $request->session()->all();
        log::debug($data);
        
        Session::flash('message', 'カートに追加しました!');
        return view('candybox.index')
                ->with('candies',$candies)
                ->with('carts',$carts);
    }

    public function store(Request $request)
    {
        $candy_info = $request->session()->get('candy_info');
        $candy_info = ltrim($candy_info, '-');
        $questionary_id = $request->session()->get('questionary_id');

        $purchase = new Purchase();
        $purchase->questionary_id = $questionary_id;
        $purchase->candy_info = $candy_info;
        $purchase->page_info = '1-2-3-4-5-5';
        $purchase->timestamps = false;
        $purchase->save();
        $request->session()->flush();

        return redirect('/questionary')->with('flash_message', 'アンケートが完了しました');
    }
}
