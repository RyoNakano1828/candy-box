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
    public function index(){
        $candies = Candy::all();

        return view('candybox.index')
                ->with('candies',$candies);
    }

    public function add(Request $request)
    {
        $candies = Candy::all();
        $purchases .= $request->post('candy_id').'-';
        log::debug($request->post('candy_id'));
        log::debug($purchases);
        // Purchase::updateOrCreate(
	    // [
		// 'questionary_id' => 1,
        // 'item_id' => $request->post('candy_id'),
        // 'page_info' => '1-2-3-4-5'
	    // ],
    // );
        Session::flash('message', 'カートに追加しました!');
	    return view('candybox.index')->with('candies',$candies);
    }
}
