<?php

namespace App\Http\Controllers;

use App\Models\boughtItems;
use App\Models\Items;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index(){
        $items = Items::all();
        return view('items')->with('items', $items);
    }

    public function session_store(Request $request){

        foreach ($request->all() as $key => $value){
            if($key != '_token'){
                $item = Items::find($key)->name;
                if($old = Session::pull($item)){
                    $new = intval($old) + $value;
                    Session::put($item, $new);
                }
                else{
                    if($value != 0)
                        Session::put($item, $value);
                }
            }
        }

        return back();
    }

    public function buy(){
        $bought = new boughtItems();
        Session::forget('_previous');
        Session::forget('_flash');
        Session::forget('_token');
        $boughtarray = new Collection();
        $price = 0;
        foreach (Session::all() as $key => $value){
            if ($item = Items::all()->where('name', '=', $key)->first->price){
            $boughtarray->push(['name' => $key, 'amount' => $value]);
            $price += $item->price * $value;}
            else{
                return 404;
            }
        }

        $bought->items = $boughtarray->toJson();
        $bought->price = $price;
        $bought->saveOrFail();
        Session::flush();
        return redirect(route('welcome'));
    }
}
