<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Favorite;



class ItemController extends Controller
{
    // 商品一覧(おすすめ)表示
    public function index()
    {
        $items=Item::all();
        // 余裕あればfavorite数順に並べ替え？
        return view('items_recommend',compact('items'));
    }
    
    // 商品一覧(お気に入り)表示
    public function favorite()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id',$user->id)->get();
        return view('items_favorite',compact('favorites'));
    }

    public function detail($id)
    {
        $item = Item::find($id);
        $categories = $item->itemCategories()->with('category')->get();
        return view('item_detail',compact('item','categories'));
    }
}